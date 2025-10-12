<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\MenuItem;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function AdminReport()
    {
        // Total Orders
        $totalOrders = Order::count();

        // Total Sales (sum of 'total' from orders)
        $totalSales = Order::sum('total');

        // Unique Customers
        $uniqueCustomers = Order::distinct('customer_name')->count('customer_name');

        // Top Item (by quantity sold)
        $topItemData = OrderDetail::select('menu_item_id')
            ->selectRaw('SUM(quantity) as total_sold')
            ->groupBy('menu_item_id')
            ->orderByDesc('total_sold')
            ->first();

        $topItem = $topItemData ? MenuItem::find($topItemData->menu_item_id) : null;

        // Sales by month for chart
        $ordersByMonth = Order::selectRaw('MONTH(created_at) as month, SUM(total) as total')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $months = [];
        $sales = [];
        foreach ($ordersByMonth as $row) {
            $months[] = date('F', mktime(0, 0, 0, $row->month, 1));
            $sales[] = $row->total;
        }

        // Top items chart (5 most sold items)
        $topItemsData = OrderDetail::select('menu_item_id')
            ->selectRaw('SUM(quantity) as total_sold')
            ->groupBy('menu_item_id')
            ->orderByDesc('total_sold')
            ->take(5)
            ->get();

        $topItems = [];
        $itemSales = [];

        foreach ($topItemsData as $item) {
            $menuItem = MenuItem::find($item->menu_item_id);
            $topItems[] = $menuItem ? $menuItem->name : 'Unknown';
            $itemSales[] = $item->total_sold;
        }

        return view('Reports.AdminReport', compact(
            'totalSales',
            'totalOrders',
            'uniqueCustomers',
            'topItem',
            'months',
            'sales',
            'topItems',
            'itemSales'
        ));
    }
    
    public function Deliveryreport()
     {
        return view('Reports.DeliveryReport');
     }
 }