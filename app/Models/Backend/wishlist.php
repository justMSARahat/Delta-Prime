<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Backend\order;
use App\Models\Backend\product;
use Auth;

class wishlist extends Model
{
    use HasFactory;

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function product(){
    	return $this->belongsTo(product::class);
    }

    public static function totalwishs(){
        if ( Auth::guard('customer')->check() ) {
            $wishlist = wishlist::orderBy('id','desc')->Where('user_id', Auth::guard('customer')->user()->id )->get();
        }
        return $wishlist;
    }

    public static function totalwishItems(){
        if ( Auth::guard('customer')->check() ) {
            $wishlist = wishlist::orderBy('id','desc')->Where('user_id', Auth::guard('customer')->user()->id )->get();
        }

        $total_items = 0;
        foreach( $wishlist as $wishlist ){
            $total_items += $wishlist->product_quantity;
        }

        return $total_items;
    }

}
