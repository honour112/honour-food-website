<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderConfirmationMail; // <-- make sure to import this


class OrderConfirmationController extends Controller
{
    public function confirmEmail($order)
    {
        
        Mail::to('customer@example.com')->send(new OrderConfirmationMail($order)); // replace with actual customer email
    }
}


