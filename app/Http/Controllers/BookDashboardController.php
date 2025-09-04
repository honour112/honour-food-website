<?php

namespace App\Http\Controllers;

use App\Models\Booktable;
use Illuminate\Http\Request;

class BookDashboardController extends Controller
{
    
    public function showBookings()
    {
        $bookings = Booktable::all();
        return view('frontdesk.managebookings', compact('bookings'));
    }
}
