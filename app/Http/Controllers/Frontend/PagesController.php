<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\baner;
use App\Models\Backend\category;
use App\Models\Backend\color;
use App\Models\Backend\brand;
use App\Models\Backend\post;
use App\Models\Backend\comment;
use App\Models\Backend\contactinfo;
use App\Models\Backend\product;
use App\Models\Backend\slider;
use App\Models\Backend\featured;
use App\Models\Backend\review;
use App\Models\Backend\order_item;
use App\Models\Backend\webinfo;
use Auth;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider     = slider::orderBy('id','asc')->get();
        $trend      = product::orderBy('id','desc')->where('status',1)->limit(4)->get();
        $trend_two  = product::orderBy('id','desc')->where('status',1)->skip(4)->limit(4)->get();
        $sale       = product::orderBy('id','desc')->where('status',1)->whereNotNull('offer_price')->limit(4)->get();
        $featured   = featured::orderBy('id','desc')->where('status',1)->limit(3)->get();
        $baner_l    = baner::orderBy('id','desc')->where('status',1)->where('position',1)->limit(1)->get();
        $baner_r    = baner::orderBy('id','desc')->where('status',1)->where('position',2)->limit(1)->get();
        $blog       = post::orderBy('id','desc')->where('status',1)->limit(3)->get();
        $brand      = brand::orderBy('id','desc')->where('status',1)->limit(5)->get();
        $webinfo    = webinfo::orderBy('id','asc')->first();
        return view('frontend/pages/index',compact('slider','trend','trend_two','sale','baner_l','baner_r','blog','featured','brand','webinfo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function productdetail($slug, Request $request)
    {
        $trend      = product::orderBy('id','desc')->where('status',1)->limit(4)->get();
        $value      = product::where('slug',$slug)->first();
        $size       = explode(',', $value->size);
        $color_s    = explode(',', $value->color);
        $color      = color::orderBy('title','asc')->where('id',$color_s)->get();
        $review_all = review::orderBy('id','desc')->where( 'product_id',$value->id )->where( 'status', 1 )->get();
        $webinfo    = webinfo::orderBy('id','asc')->first();
        if( Auth::guard('customer')->check() ){
            $my_order   = order_item::where( 'product_id',$value->id )->where( 'user_id', Auth::guard('customer')->user()->id )->first();
            $review     = review::where( 'product_id',$value->id )->where( 'customer_id', Auth::guard('customer')->user()->id )->first();
            $review_count   = $review->count();
        }
        else{
            $my_order   = order_item::where( 'product_id',$value->id )->where( 'ip', $request->ip() )->first();
            $review_count   = 1;
        }
        if( !is_null($value) ){
            return view('frontend/pages/product-details',compact('value','trend','size','color','color_s','my_order','review_count','review_all','webinfo'));
        }
        else{
            return back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Blog()
    {
        $blogs       = post::orderBy('id','desc')->where('status',1)->paginate(4);
        return view('frontend/pages/blog',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function blogdetails($slug)
    {
        $blogs       = post::orderBy('id','desc')->where('status',1)->take(2)->skip(1)->get();;
        $value       = post::where('slug',$slug)->first();
        $comment_num = comment::orderBy('id','desc')->where('status',1)->where('post_id',$value->id)->count();
        $comments    = comment::orderBy('id','desc')->where('status',1)->where('post_id',$value->id)->where('parent',1)->get();;
        if( !is_null($value) ){
            return view('frontend/pages/blog-details',compact('value','blogs','comments','comment_num'));
        }
        else{
            return back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(request $request)
    {
        $search  = $request->search;
        $result  = post::orwhere('title','like','%'.$search.'%')->orwhere('tag','like','%'.$search.'%')->paginate(14);
        $result_Num = $result->count();
        return view('frontend/pages/blog_search',compact('result','search','result_Num'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function category_search(request $request)
    {
        $search= $request->category;
        $result  = post::orwhere('category->slug','like','%'.$search.'%')->paginate(14);
        $result_Num = $result->count();
        return view('frontend/pages/blog_search',compact('result','search','result_Num'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search_product(request $request)
    {
        $search     = $request->search;
        $result     = product::orwhere('title','like','%'.$search.'%')->paginate(14);
        $result_Num = $result->count();
        $webinfo    = webinfo::orderBy('id','asc')->first();
        return view('frontend/pages/shop_search',compact('result','search','result_Num','webinfo'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function category_search_product(request $request)
    {
        $search     = $request->category;
        $result     = product::where('category','like','%'.$search.'%')->paginate(14);
        $result_Num = $result->count();
        $webinfo    = webinfo::orderBy('id','asc')->first();
        return view('frontend/pages/shop_search',compact('result','search','result_Num','webinfo'));

    }
    public function brand_search_product(request $request)
    {
        $search     = $request->brand;
        $result     = product::where('brand','like','%'.$search.'%')->paginate(14);
        $result_Num = $result->count();
        $webinfo    = webinfo::orderBy('id','asc')->first();
        return view('frontend/pages/shop_search',compact('result','search','result_Num','webinfo'));

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function menu_search_product($id, request $request)
    {
        $category   = category::find($id);
        if( !is_null( $category ) ){
            $search     = 1;
            $result     = product::where('category','like','%'.$category->id.'%')->paginate(14);
            $result_Num = $result->count();
            $webinfo    = webinfo::orderBy('id','asc')->first();

            return view('frontend/pages/shop_search',compact('result','search','result_Num','webinfo'));
        }
        else{
            return back();
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function shop()
    {
        $webinfo    = webinfo::orderBy('id','asc')->first();
        $all_products   = product::orderBy('id','desc')->where('status',1)->paginate(14);
        return view('frontend/pages/shop',compact('all_products','webinfo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function shop_filter(Request $request)
    {
        $query = product::orderBy('id','desc');
        if($request->minamount && $request->maxamount){
            // This will only executed if you received any price
            // Make you you validated the min and max price properly
            $query = $query->where('price','>=',$request->minamount);
            $query = $query->where('price','<=',$request->maxamount);
        }
        $all_products = $query->paginate(12);
        $webinfo    = webinfo::orderBy('id','asc')->first();
        return view('frontend.pages.shop', compact('all_products'));


        $minPrice= $request->minamount;
        $maxPrice= $request->maxamount;
        if($request->price_range){
          $price_range = explode('-', $request->price_range);
          $minPrice= $price_range[0];
          $maxPrice= $price_range[1];
      }
       $prop = product::active()
        ->when($minPrice, function($q) use($minPrice,$maxPrice){
          return $q->whereHas('proDetail', function($sq) use($minPrice,$maxPrice){
              $sq->where([
                  ['minprice','>=', $minPrice],
                  ['maxprice','<=', $maxPrice]
              ]);
          });
      })
      ->without('builder')
       ->paginate('15');
      return view('search', compact('prop','allCategory','cities','req','webinfo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function customer()
    {
        return view('frontend/pages/customer');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function contact()
    {
        $contact = contactinfo::orderBy('id','asc')->first();
        return view('frontend/pages/contact',compact('contact'));
    }



}
