<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\MenuItem;
use App\Models\Reservation;
use App\Models\Booktable;

class ReportController extends Controller
{

public function AdminReport()
{

// ORDER COUNTS
$totalOrders = Order::count();

$acceptedOrders = Order::where('order_status','accepted')->count();

$pendingOrders = Order::where('order_status','pending')->count();

$rejectedOrders = Order::where('order_status','rejected')->count();


// TOTAL REVENUE
$totalRevenue = Order::where('order_status','accepted')
->where('payment_status','paid')
->sum('total');


// UNIQUE CUSTOMERS
$uniqueCustomers = Order::distinct('customer_name')->count('customer_name');


// ITEMS SOLD
$totalItemsSold = OrderDetail::sum('quantity');


// RESERVATIONS
$totalReservations = Reservation::count();


// TABLE BOOKINGS
$totalBookings = Booktable::count();


// TOP SELLING ITEM
$topItemData = OrderDetail::select('menu_item_id')
->selectRaw('SUM(quantity) as total_sold')
->groupBy('menu_item_id')
->orderByDesc('total_sold')
->first();

$topItem = $topItemData ? MenuItem::find($topItemData->menu_item_id) : null;



// MONTHLY SALES
$ordersByMonth = Order::where('order_status','accepted')
->where('payment_status','paid')
->selectRaw('MONTH(created_at) as month, SUM(total) as total')
->groupBy('month')
->orderBy('month')
->get();

$months = [];
$sales = [];

foreach($ordersByMonth as $row)
{
$months[] = date('F', mktime(0,0,0,$row->month,1));
$sales[] = $row->total;
}



// TOP 5 ITEMS
$topItemsData = OrderDetail::select('menu_item_id')
->selectRaw('SUM(quantity) as total_sold')
->groupBy('menu_item_id')
->orderByDesc('total_sold')
->take(5)
->get();

$topItems = [];
$itemSales = [];

foreach($topItemsData as $item)
{
$menuItem = MenuItem::find($item->menu_item_id);

$topItems[] = $menuItem ? $menuItem->name : 'Unknown';

$itemSales[] = $item->total_sold;
}



// PEAK ORDERING HOURS
$peakOrders = Order::selectRaw('HOUR(created_at) as hour, COUNT(*) as total')
->groupBy('hour')
->orderBy('hour')
->get();

$hours = [];
$orderCounts = [];

foreach($peakOrders as $row)
{
$hours[] = $row->hour . ":00";
$orderCounts[] = $row->total;
}



// TOP CUSTOMERS
$topCustomers = Order::select('customer_name')
->selectRaw('SUM(total) as total_spent')
->groupBy('customer_name')
->orderByDesc('total_spent')
->take(5)
->get();



// BUSINESS RECOMMENDATION
$leastSelling = OrderDetail::select('menu_item_id')
->selectRaw('SUM(quantity) as total_sold')
->groupBy('menu_item_id')
->orderBy('total_sold')
->first();

$leastItem = $leastSelling ? MenuItem::find($leastSelling->menu_item_id) : null;

$recommendation = "Your best selling item is {$topItem->name}. Consider promoting it more on your menu.";

if($leastItem)
{
$recommendation .= " The item {$leastItem->name} sells the least. You may want to improve its visibility or offer a promotion.";
}



// RETURN VIEW
return view('Reports.AdminReport', compact(

'totalOrders',
'acceptedOrders',
'pendingOrders',
'rejectedOrders',
'totalRevenue',
'uniqueCustomers',
'totalItemsSold',
'topItem',
'totalReservations',
'totalBookings',
'months',
'sales',
'topItems',
'itemSales',
'hours',
'orderCounts',
'topCustomers',
'recommendation'

));

}



public function downloadReport()
{

$fileName = "restaurant_report.csv";

$headers = [
"Content-Type" => "text/csv",
"Content-Disposition" => "attachment; filename=$fileName",
];

$callback = function(){

$file = fopen('php://output','w');

fputcsv($file,[
'Order ID',
'Customer',
'Phone',
'Total',
'Order Status',
'Payment Status',
'Date'
]);

$orders = Order::all();

foreach($orders as $order)
{
fputcsv($file,[
$order->id,
$order->customer_name,
$order->phone,
$order->total,
$order->order_status,
$order->payment_status,
$order->created_at
]);
}

fclose($file);

};

return response()->stream($callback,200,$headers);

}

}