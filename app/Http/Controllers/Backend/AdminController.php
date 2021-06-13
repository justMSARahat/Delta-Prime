<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\category;
use App\Models\Backend\brand;
use App\Models\Backend\product;
use App\Models\Backend\order;
use App\Models\customer;
use DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $category       = category::orderBy('title','asc')->get();
        $category_count = $category->count();
        $brand          = brand::orderBy('title','asc')->where('status',1)->get();
        $brand_count    = $brand->count();
        $customer       = customer::orderBy('id','asc')->get();
        $customer_count = $customer->count();
        $order          = order::orderBy('id','asc')->where('status',1)->orWhere('status',2)->get();
        $order_count    = $order->count();
        $product        = product::orderBy('id','asc')->get();
        $product_count  = $product->count();

        $orders  = order::orderBy('id','desc')->where( 'status' , 1 )->orWhere( 'status' , 2 )->limit(4);

        $OrderChart = order::select(DB::raw("COUNT(*) as count"))
                    ->whereYear('created_at',date('Y'))
                    ->groupBy(DB::raw("Month(created_at)"))
                    ->pluck('count');
        $OrderMonth  = order::select(DB::raw("Month(created_at) as month"))
                    ->whereYear('created_at',date('Y'))
                    ->groupBy(DB::raw("Month(created_at)"))
                    ->pluck('month');
        $datas      = array(0,0,0,0,0,0,0,0,0,0,0,0,0);
        foreach( $OrderMonth as $index => $month ){
            $datas[$month]  = $OrderChart[$index];
        }


        $userChart = customer::select(DB::raw("COUNT(*) as count"))
                    ->whereYear('created_at',date('Y'))
                    ->groupBy(DB::raw("Month(created_at)"))
                    ->pluck('count');
        $userMonth  = customer::select(DB::raw("Month(created_at) as month"))
                    ->whereYear('created_at',date('Y'))
                    ->groupBy(DB::raw("Month(created_at)"))
                    ->pluck('month');
        $users      = array(0,0,0,0,0,0,0,0,0,0,0,0,0);
        foreach( $userMonth as $index => $month ){
            $users[$month]  = $userChart[$index];
        }

        return view('backend.dashboard',compact('category','category_count','brand','brand_count','customer','customer_count','order','order_count','orders','product_count','datas','users'));
    }

}
