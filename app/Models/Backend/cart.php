<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Backend\order;
use App\Models\Backend\product;
use Auth;

class cart extends Model
{
    use HasFactory;


    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function order(){
    	return $this->belongsTo(order::class);
    }

    public function product(){
    	return $this->belongsTo(Product::class);
    }

    public static function totalCarts(){
        if ( Auth::guard('customer')->check() ) {
            $carts = cart::Where('user_id', Auth::guard('customer')->user()->id )->Where( 'order_id' , Null )->get();
        }
        else{
            $carts = cart::Where('ip_address', request()->ip() )->Where('order_id',Null)->get();
        }

        return $carts;
    }

    public static function totalItems(){
        if ( Auth::guard('customer')->check() ) {
            $carts = cart::Where('user_id', Auth::guard('customer')->user()->id )->Where( 'order_id' , Null )->get();
        }
        else{
            $carts = cart::Where('ip_address', request()->ip() )->Where( 'order_id' , Null )->get();
        }

        $total_items = 0;
        foreach( $carts as $cart ){
            $total_items += $cart->product_quantity;
        }

        return $total_items;
    }

    public static function totalPrice(){
        if ( Auth::guard('customer')->check() ) {
            $carts = cart::Where('user_id', Auth::guard('customer')->user()->id )->Where( 'order_id' , Null )->get();
        }
        else{
            $carts = cart::Where('ip_address', request()->ip() )->Where( 'order_id' , Null )->get();
        }



        $total_price = 0;
        foreach( $carts as $cart ){
            if ( !is_null( $cart->product->offer_price ) ) {
                $total_price += $cart->product_quantity * $cart->product->offer_price;
            }
            else{
                $total_price += $cart->product_quantity * $cart->product->price;
            }
        }

        return $total_price;
    }


}
