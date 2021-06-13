<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\slider;
use Illuminate\Support\Str;
use File;
use Image;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = slider::orderBy('id','desc')->paginate(15);
        return view('backend.pages.slider.manage',compact('sliders'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.slider.create');
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
                'desc'      => 'required',
                'btn_text'  => 'required',
                'btn_link'  => 'required',
                'status'    => 'required',
                'image'     => 'required',
            ],
            [
                'title.required'        => 'Please Insert Title',
                'status.required'       => 'Please Select Product Status ',
                'desc.required'         => 'Please Insert Description',
                'btn_text.required'     => 'Please Insert Button Text',
                'btn_link.required'     => 'Please Insert Button Link',
                'image.required'        => 'Please Insert Slider Image',
            ],

        );


        $slider =  new slider();

        $slider->title          = $request->title;
        $slider->slug           = Str::slug($request->title);
        $slider->desc           = $request->desc;
        $slider->btn_text       = $request->btn_text;
        $slider->btn_link       = $request->btn_link;
        $slider->title          = $request->title;
        $slider->status         = $request->status;

        if($request->image){
            $image = $request->file('image');
            $img   = rand().'_'.'slider-Image'.'_'.'_'.$image->getClientOriginalExtension();
            $loc   = public_path('Backend/Image/Slider/'.$img);
            Image::make($image)->save($loc);
            $slider->image   = $img;
        }

        $slider->save();
        return redirect()->route('slider.manage');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = slider::find($id);
        if( !is_null($slider) ){
            return view('backend.pages.slider.edit',compact('slider'));
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
                'desc'      => 'required',
                'btn_text'  => 'required',
                'btn_link'  => 'required',
                'status'    => 'required',
            ],
            [
                'title.required'        => 'Please Insert Title',
                'status.required'       => 'Please Select Product Status ',
                'desc.required'         => 'Please Insert Description',
                'btn_text.required'     => 'Please Insert Button Text',
                'btn_link.required'     => 'Please Insert Button Link',
            ],
        );

        $slider =  slider::find($id);

        $slider->title          = $request->title;
        $slider->desc           = $request->desc;
        $slider->btn_text       = $request->btn_text;
        $slider->btn_link       = $request->btn_link;
        $slider->title          = $request->title;
        $slider->status         = $request->status;

        if($request->image){

            if( file::exists('Backend/Image/Slider/' .$slider->image) ){
                file::delete('Backend/Image/Slider/' .$slider->image);
            }

            $image = $request->file('image');
            $img   = rand().'_'.'slider-Image'.'_'.'_'.$image->getClientOriginalExtension();
            $loc   = public_path('Backend/Image/Slider/'.$img);
            Image::make($image)->save($loc);
            $slider->image   = $img;
        }

        $slider->save();
        return redirect()->route('slider.manage');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = slider::find($id);
        if( !is_null($slider) ){
            if( file::exists('Backend/Image/Slider/' .$slider->image) ){
                file::delete('Backend/Image/Slider/' .$slider->image);
            }
            $slider->delete();
            return redirect()->route('slider.manage');
        }
        else{
            return back();
        }
    }
}
