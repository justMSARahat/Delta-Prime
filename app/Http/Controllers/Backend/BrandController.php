<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\brand;
use App\Models\Backend\category;
use App\Models\Backend\product;
use Illuminate\Support\Str;
use File;
use Image;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = brand::orderBy('id','desc')->paginate(15);
        return view('backend.pages.brand.manage',compact('brands'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.brand.create');
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
                'status'     => 'required',
            ],
            [
                'title.required'        => 'Please Insert Title',
                'status.required'       => 'Please Select Product Status ',
            ],

        );

        $brand =  new brand();

        $brand->title          = $request->title;
        $brand->slug           = Str::slug($request->title);
        $brand->status         = $request->status;

        if($request->logo){
            $image = $request->file('logo');
            $img   = rand().'_'.'Brand-Image'.'_'.$request->title.'_'.$image->getClientOriginalExtension();
            $loc   = public_path('Backend/Image/Brand/'.$img);
            Image::make($image)->save($loc);
            $brand->logo   = $img;
        }


        $brand->save();
        $notification = array(
            'message' => 'New Brand Published',
            'alert-type' => 'success'
        );
        return redirect()->route('brand.manage')->with($notification);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = brand::find($id);
        if( !is_null($brand) ){
            return view('backend.pages.brand.edit',compact('brand'));
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
                'status'     => 'required',
            ],
            [
                'title.required'        => 'Please Insert Title',
                'status.required'       => 'Please Select Product Status ',
            ],

        );

        $brand =  brand::find($id);

        $brand->title          = $request->title;
        $brand->slug           = Str::slug($request->title);
        $brand->status         = $request->status;

        if($request->logo){

            if( file::exists('Backend/Image/Brand/' .$brand->logo) ){
                file::delete('Backend/Image/Brand/' .$brand->logo);
            }

            $image = $request->file('logo');
            $img   = rand().'_'.'Brand'.'_'.$request->title.'_'.'Updated'.'_'.$image->getClientOriginalExtension();
            $loc   = public_path('Backend/Image/Brand/'.$img);
            Image::make($image)->save($loc);
            $brand->logo   = $img;
        }

        $brand->save();
        $notification = array(
            'message' => 'Brand Updated',
            'alert-type' => 'success'
        );
        return redirect()->route('brand.manage')->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = brand::find($id);
        if( !is_null($brand) ){
            if( file::exists('Backend/Image/Brand/' .$brand->logo) ){
                file::delete('Backend/Image/Brand/' .$brand->logo);
            }
            $brand->delete();
            $notification = array(
                'message' => 'Brand Deleted',
                'alert-type' => 'danger'
            );
            return redirect()->route('brand.manage')->with($notification);
        }
        else{
            return back();
        }
    }
}
