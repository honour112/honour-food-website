<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\User;
use Illuminate\Support\Facades\Auth;

class DeliveryController extends Controller
{
    /**
     * Show delivery agent status
     */
    public function showStatus()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        
        $status = $user->status;

        return view('delivery.status', compact('status'));
    }

    
    public function Showdelivery()
    {
        return view('delivery.deliverydashboard');
    }

    /**
     * Toggle delivery agent status (active/inactive)
     */
    public function toggleStatus()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        // Only allow delivery agents to change their status
        if ($user->role !== 'delivery') {
            return redirect()->back()->with('error', 'Unauthorized');
        }

        // Toggle status
        $user->status = $user->status === 'active' ? 'inactive' : 'active';
        $user->save();

        return redirect()->back()->with('success', 'Status updated successfully');
    }
    // Delivery agent dashboard to view assigned orders
    public function dashboard()
    {
        
        $orders = [
            [
                'id' => 1,
                'customer_name' => 'Nkwambi Treasure Bah',
                'phone' => '678399177',
                'location' => 'Bonaberi',
                'total' => "4.500 FCFA",
                'payment_status' => 'unpaid',
            ],
            [
                'id' => 2,
                'customer_name' => 'Samuella',
                'phone' => '',
                'location' => 'Akwa',
                'total' => "31.668 FCFA",
                'payment_status' => 'paid',
            ],
        ];

        return view('delivery.assigndelivery', compact('orders'));
    }

    // Update payment status of an order
}


    

