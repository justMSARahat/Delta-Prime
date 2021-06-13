<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\brand;
use App\Models\Backend\category;
use App\Models\Backend\product;
use App\Models\Backend\webinfo;
use Illuminate\Support\Str;
use File;
use Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = product::orderBy('id','desc')->paginate(15);
        $webinfo    = webinfo::orderBy('id','asc')->first();
        return view('backend.pages.product.manage',compact('products','webinfo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function preview($id)
    {
        $product = product::find($id);
        if( !is_null($product) ){
            return view('backend.pages.product.preview',compact('product'));
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
    public function create()
    {
        $brands  = brand::orderBy('title','asc')->where('status',1)->get();
        return view('backend.pages.product.create',compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'title'     => 'required',
                'short'     => 'required',
                'desc'      => 'required',
                'price'     => 'required',
                'quantity'  => 'required',
                'status'    => 'required',
                'brand'     => 'required',
                'category'  => 'required',
                'primary'   => 'required'
            ],
            [
                'title.required'        => 'Please Insert Title',
                'short_desc.required'   => 'Please Insert Short Descrioption',
                'desc.required'         => 'Please Insert Descrioption',
                'price.required'        => 'Please Insert Price',
                'quantity.required'     => 'Please Insert Quantity',
                'status.required'       => 'Please Select Product Status ',
                'brand.required'        => 'Please Select Brand',
                'category.required'     => 'Please Select Category',
                'primary.required'      => 'Please Insert A Gallery Image'
            ],

        );

        $Product =  new product();

        $Product->title          = $request->title;
        $Product->slug           = Str::slug($request->title);
        $Product->short_desc     = $request->short;
        $Product->desc           = $request->desc;
        $Product->price          = $request->price;
        $Product->offer_price    = $request->offer;
        $Product->quantity       = $request->quantity;
        $Product->sku            = $request->sku;
        $Product->status         = $request->status;
        $Product->brand          = $request->brand;
        $Product->category       = $request->category;
        $Product->color          = $request->color;
        // $Product->size           = $request->size;
        $Product->weight         = $request->weight;
        $Product->dimention      = $request->dimention;

        $size = $request->input('size');
        $size_f = implode(',', $size);
        $Product->size = $size_f;

        $color = $request->input('color');
        $color_f = implode(',', $color);
        $Product->color = $color_f;

        if($request->primary){
            $image = $request->file('primary');
            $img   = rand().'_'.'Product_Main_Image'.'_'.$image->getClientOriginalExtension();
            $loc   = public_path('Backend/Image/Product/'.$img);
            Image::make($image)->save($loc);
            $Product->primary   = $img;
        }
        if($request->second_image){
            $image = $request->file('second_image');
            $img   = rand().'_'.'Product_second_image'.'_'.$image->getClientOriginalExtension();
            $loc   = public_path('Backend/Image/Product/'.$img);
            Image::make($image)->save($loc);
            $Product->second_image   = $img;
        }
        if($request->third_image){
            $image = $request->file('third_image');
            $img   = rand().'_'.'Product_third_image'.'_'.$image->getClientOriginalExtension();
            $loc   = public_path('Backend/Image/Product/'.$img);
            Image::make($image)->save($loc);
            $Product->third_image   = $img;
        }

        $Product->save();
        return redirect()->route('product.manage');

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = product::find($id);
        $brands  = brand::orderBy('title','asc')->where('status',1)->get();
        $size    = explode(',', $product->size);
        $color_s = explode(',', $product->color);


        if( !is_null($product) ){
            return view('backend.pages.product.edit',compact('product','brands','size','color_s'));
        }
        else{
            return back();
        }
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
        $request->validate(
            [
                'title'     => 'required',
                'short'     => 'required',
                'desc'      => 'required',
                'price'     => 'required',
                'quantity'  => 'required',
            ],
            [
                'title.required'        => 'Please Insert Title',
                'short_desc.required'   => 'Please Insert Short Descrioption',
                'desc.required'         => 'Please Insert Descrioption',
                'price.required'        => 'Please Insert Price',
                'quantity.required'     => 'Please Insert Quantity',
            ],

        );

        $Product =  product::find($id);

        $Product->title          = $request->title;
        $Product->slug           = Str::slug($request->title);
        $Product->short_desc     = $request->short;
        $Product->desc           = $request->desc;
        $Product->price          = $request->price;
        $Product->offer_price    = $request->offer;
        $Product->quantity       = $request->quantity;
        $Product->sku            = $request->sku;
        $Product->status         = $request->status;
        $Product->brand          = $request->brand;
        $Product->category       = $request->category;

        $size = $request->input('size');
        $size_f = implode(',', $size);
        $Product->size = $size_f;

        $color = $request->input('color');
        $color_f = implode(',', $color);
        $Product->color = $color_f;

        if($request->primary){

            if( file::exists('Backend/Image/Product/' .$Product->primary) ){
                file::delete('Backend/Image/Product/' .$Product->primary);
            }

            $image = $request->file('primary');
            $img   = rand().'_'.'Product_Main_Image'.'_'.$request->title.'_'.'Updated'.'_'.$image->getClientOriginalExtension();
            $loc   = public_path('Backend/Image/Product/'.$img);
            Image::make($image)->save($loc);
            $Product->primary   = $img;
        }
        if($request->second_image){

            if( file::exists('Backend/Image/Product/' .$Product->second_image) ){
                file::delete('Backend/Image/Product/' .$Product->second_image);
            }

            $image = $request->file('second_image');
            $img   = rand().'_'.'Product_second_image'.'_'.$request->title.'_'.'Updated'.'_'.$image->getClientOriginalExtension();
            $loc   = public_path('Backend/Image/Product/'.$img);
            Image::make($image)->save($loc);
            $Product->second_image   = $img;
        }
        if($request->third_image){

            if( file::exists('Backend/Image/Product/' .$Product->third_image) ){
                file::delete('Backend/Image/Product/' .$Product->third_image);
            }

            $image = $request->file('third_image');
            $img   = rand().'_'.'Product_third_image'.'_'.$request->title.'_'.'Updated'.'_'.$image->getClientOriginalExtension();
            $loc   = public_path('Backend/Image/Product/'.$img);
            Image::make($image)->save($loc);
            $Product->third_image   = $img;
        }

        $Product->save();
        return redirect()->route('product.manage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = product::find($id);
        if( !is_null($product) ){
            if( file::exists('Backend/Image/Product/' .$product->primary) ){
                file::delete('Backend/Image/Product/' .$product->primary);
            }
            if( file::exists('Backend/Image/Product/' .$product->second_image) ){
                file::delete('Backend/Image/Product/' .$product->second_image);
            }
            if( file::exists('Backend/Image/Product/' .$product->third_image) ){
                file::delete('Backend/Image/Product/' .$product->third_image);
            }
            $product->delete();
            return redirect()->route('product.manage');
        }
        else{
            return back();
        }
    }
}
