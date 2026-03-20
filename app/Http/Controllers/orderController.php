<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class orderController extends Controller
{
    //
    public function confirmPayment($id)
{
    $order = \App\Models\Order::findOrFail($id);
    
    // This marks the record in your database!
    $order->update([
        'payment_status' => 'paid',
        'order_status' => 'accepted' // Optional: move from pending to accepted
    ]);

    return response()->json(['message' => 'Database Updated!']);
}


public function showThanks()
{
    // Check session first
    $orderId = session('last_order_id');

    if (!$orderId) {
        // Log this or dd() here to see if the session is actually empty
        // \Log::info('No order ID found in session'); 
        return redirect()->route('menu-page')->with('error', 'Order session expired.');
    }

    $order = \App\Models\Order::find($orderId);

    if (!$order) {
        return redirect()->route('menu-page');
    }

    return view('website.thank-page', compact('order'));
}
}

