<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Backend\cart;
use App\Models\Backend\product;
use App\Models\customer;
use App\Models\Backend\webinfo;
use Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $webinfo    = webinfo::orderBy('id','asc')->first();
        return view('frontend/pages/cart',compact('webinfo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'product_id'        => 'required',
        ],
        [
            'product_id.required'   => 'Please Select a Product'
        ]);
        if( Auth::guard('customer')->check() ){
            $cart    = cart::where('user_id',Auth()->guard('customer')->user()->id)->where('product_id',$request->product_id)->first();
        }
        else{
            $cart = cart::Where('ip_address', request()->ip() )->Where('product_id' , $request->product_id )->Where('order_id',Null)->first();
        }
        if( !is_null( $cart ) ){
            $cart->increment('product_quantity');

            $notification = array(
                'message' => 'Product Added Successfully to the Cart',
                'alert-type' => 'success'
            );
            return back()->with($notification);
        }
        else{
            $cart = new cart();

            if ( Auth::guard('customer')->check() ) {
                $cart->user_id = Auth()->guard('customer')->user()->id;
            }
            $cart->ip_address       = $request->ip();
            $cart->product_id       = $request->product_id;
            $cart->product_quantity = $request->product_quantity;
            $cart->size             = $request->size;
            $cart->color            = $request->color;


            // dd($cart); exit();

            $cart->save();


            $notification = array(
                'message' => 'Product Added Successfully to the Cart',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
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
        $cart       = cart::find($id);
        if( !is_null( $cart ) ){
            $cart->product_quantity = $request->product_quantity;
            $cart->save();


            $notification = array(
                'message' => 'Product Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);

        }else{
            return redirect()->back();
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
        $cart = cart::find($id);
        if( !is_null( $cart ) ){
            $cart->delete();


            $notification = array(
                'message' => 'Product Removed Successfully',
                'alert-type' => 'warning'
            );
            return back()->with($notification);
        }
        else{
            return back();
        }

    }
}
