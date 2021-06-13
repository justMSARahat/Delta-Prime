<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\review;
use Auth;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews         = review::orderBy('id','desc')->where('status',1)->paginate(10);
        $under_reviews   = review::orderBy('id','desc')->where('status',2)->paginate(10);
        return view('backend.pages.review.manage', compact('reviews','under_reviews'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $review    = new review();

        $review->customer_id = Auth::guard('customer')->user()->id;
        $review->product_id  = $request->product_id;
        $review->message     = $request->message;

        if( $request->rating1 ){
            $review->rating      = 1;
        }
        if( $request->rating2 ){
            $review->rating      = 2;
        }
        if( $request->rating3 ){
            $review->rating      = 3;
        }
        if( $request->rating4 ){
            $review->rating      = 4;
        }
        if( $request->rating5 ){
            $review->rating      = 5;
        }

        $review->save();

        $notification = array(
            'message' => 'Rating Posted! Rating under Review.',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $review = review::find($id);

        if( !is_null($review) ){
            $review->status     = 1;
            $review->save();
            return back();
        }
        else{
            return back();
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
