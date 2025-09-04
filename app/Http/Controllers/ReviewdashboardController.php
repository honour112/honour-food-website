<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewdashboardController extends Controller
{
    public function index()
    //function to read,update and destroy.
    {
    $reviews = Review::all();
    // dd($reviews);
    // $reviews =Review::where('name', 'mr Larry')->first();
    
    //   $reviews = Review::find(1);
    //dd($reviews);
     return view("frontdesk.reviews",compact('reviews'));
    // return view("frontdesk.reviews",[
    //    'reviews' => $reviews
     //]);
     
      
    }
    // this is the function to destroy
    public function destroy($id)
    {
        $review = Review::find($id);
        if ($review) {
            $review->delete();
            return redirect()->back()->with('success', 'Review deleted successfully!');
        }
        return redirect()->back()->with('error', 'Review not found!');
    }

    // this is  the function to update 
    public function update(Request $request, $id)
{
    $request->validate([
        'review' => 'required|string',
    ]);

    $review = Review::find($id);

    if ($review) {
        $review->update([
            'review' => $request->review,
        ]);

        return redirect()->back()->with('success', 'Review updated successfully!');
    }

    return redirect()->back()->with('error', 'Review not found!');
}

}