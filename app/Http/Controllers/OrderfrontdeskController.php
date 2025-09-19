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
        $orders = Order::with('details.menuItem')
                       ->orderBy('created_at', 'desc')
                       ->get();

        return view('frontdesk.manageorders', compact('orders'));
    }

    // Accept an order
    public function accept($id)
    {
        $order = Order::findOrFail($id);
        $order->order_status = 'accepted';
        $order->save();

        if ($order->email) {
            Mail::to($order->email)->send(new \App\Mail\OrderConfirmationMail($order));
        }

        return redirect()->back()->with('success', 'Order accepted successfully! Mail has been sent.');
    }

    // Decline an order
    public function decline($id)
    {
        $order = Order::findOrFail($id);
        $order->order_status = 'rejected';
        $order->save();

        return redirect()->back()->with('success', 'Order declined successfully!');
    }

    // ✅ Toggle Payment Status
    public function updatePaymentStatus($id)
    {
        $order = Order::findOrFail($id);

        // Toggle between paid and unpaid
        if ($order->payment_status === 'paid') {
            $order->payment_status = 'unpaid';
        } else {
            $order->payment_status = 'paid';
        }

        $order->save();

        return redirect()->back()->with('success', 'Payment status updated successfully!');
    }
}
