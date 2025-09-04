<?php

namespace App\Http\Controllers;
use App\Models\Review;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ReviewPageController extends Controller
{
    public function Reviewpage(){
         return view('website.review-page');

    }
    public function storeReview(Request $request){

        try {
            Review::create(
            ['name'=>$request->name,
             'date'=>$request->date,
            'review'=>$request->review,


            ]

        );
        } catch (\Throwable $th) {
            Log::error($th);
            return redirect()->back()->with('error',$th->getMessage());
        }
  return redirect()->route('review-page')->with('success', 'Review submitted successfully!');
}
}