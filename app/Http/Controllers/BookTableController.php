<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookTable;
use App\Models\Review;

class BookTableController extends Controller
{
    public function booktablePage()
    {
        return view('website.booktable-page');
    }

    public function booktable(Request $request)
    {

        BookTable::create([
        'name' => $name = $request->input('name'),
        'email' => $email = $request->input('email'),
        'date' => $date = $request->input('date'),
        'time' => $time = $request->input('time'),
        'people' => $people = $request->input('people'),
        'requests' => $requests = $request->input('requests'),
        'phone' => $phone = $request->input('phone'),
        ]);
        return redirect()->route('booktable-page')->with('success', 'Table booked successfully!');
    }
}