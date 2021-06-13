<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\wishlist;
use Illuminate\Support\Str;
use App\Models\Backend\cart;
use App\Models\Backend\product;
use App\Models\customer;
use Auth;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend/pages/wishlist');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if( Auth::guard('customer')->check() ){
            $wishlist_i    = wishlist::where('user_id',Auth()->guard('customer')->user()->id)->where('product_id',$request->product_id)->first();
        }
        else{
            return redirect()->route('login.form');
        }
        if( !is_null( $wishlist_i ) ){
            return back();
        }
        else{
            $wishlist = new wishlist();

            if ( Auth::guard('customer')->check() ) {
                $wishlist->user_id = Auth()->guard('customer')->user()->id;
            }

            $wishlist->ip_address       = $request->ip();
            $wishlist->product_id       = $request->product_id;

            $wishlist->save();
            return redirect()->back();
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wishlist = wishlist::find($id);
        if( !is_null( $wishlist ) ){
            $wishlist->delete();
            return back();
        }
        else{
            return back();
        }

    }
}
