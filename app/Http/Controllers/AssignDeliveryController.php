<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;

class AssignDeliveryController extends Controller
{
    public function assignDelivery()
    {
        // get all active delivery agents
        $agents = User::where('role', 'delivery')
                      ->where('status', 'active')
                      ->get();

        // get all pending orders (or whichever you want to assign)
        $orders = Order::where('order_status', 'accepted')->get();

        return view('frontdesk.assigndelivery', compact('agents', 'orders'));
    }

    public function assignToAgent(Request $request, $orderId)
    {
        $request->validate([
            'agent_id' => 'required|exists:users,id'
        ]);

        $order = Order::findOrFail($orderId);
        $order->delivery_agent_id = $request->agent_id; // add this column to orders table
        $order->save();

        return redirect()->back()->with('success', 'Order assigned successfully!');
    }
}
