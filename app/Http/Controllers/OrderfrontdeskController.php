<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;

class OrderfrontdeskController extends Controller
{
    // Show all orders in the frontdesk dashboard
    public function showOrder()
    {
        // Get all orders with their details and menu items
        $orders = Order::with('details.menuItem') // eager load order details and their menu items
                       ->orderBy('created_at', 'desc') // latest orders first
                       ->get();

        // Pass orders to the view
        return view('frontdesk.manageorders', compact('orders'));
    }

    // Accept an order
    public function accept($id)
    {
        $order = Order::findOrFail($id);
        $order->order_status = 'accepted'; // matches migration field
        $order->save();


        Mail::to($order->email)->send(new \App\Mail\OrderConfirmationMail($order));

        return redirect()->back()->with('success', 'Order accepted successfully! Mail has been sent.');
    }

    // Decline an order
    public function decline($id)
    {
        $order = Order::findOrFail($id);
        $order->order_status = 'rejected'; // matches migration field
        $order->save();

        return redirect()->back()->with('success', 'Order declined successfully!');
    }
   

}

