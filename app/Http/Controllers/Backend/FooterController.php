<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\footer;
use File;
use Image;

class FooterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $footer = footer::orderBy('id','asc')->get();
        return view('backend.pages.footer.manage',compact('footer'));
    }

   /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $info = footer::find($id);
        if( !is_null($info) ){
            return view('backend.pages.footer.edit',compact('info'));
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

        $footer =  footer::find($id);

        $footer->description     = $request->description;
        $footer->email           = $request->email;
        $footer->address         = $request->address;
        $footer->phone           = $request->phone;
        $footer->copywrite       = $request->copywrite;
        $footer->title_one       = $request->title_one;
        $footer->title_one_desc  = $request->title_one_desc;
        $footer->title_two       = $request->title_two;
        $footer->title_two_desc  = $request->title_two_desc;
        $footer->facebook        = $request->facebook;
        $footer->twitter         = $request->twitter;
        $footer->dribbble        = $request->dribbble;
        $footer->behance         = $request->behance;

        if($request->logo){

            if( file::exists('Backend/Image/' .$footer->logo) ){
                file::delete('Backend/Image/' .$footer->logo);
            }

            $image = $request->file('logo');
            $img   = rand().'_'.'Footer-Logo'.'_'.'Updated'.'_'.$image->getClientOriginalExtension();
            $loc   = public_path('Backend/Image/'.$img);
            Image::make($image)->save($loc);
            $footer->logo   = $img;
        }

        $footer->save();
        $notification = array(
            'message' => 'Footer Updated',
            'alert-type' => 'success'
        );
        return redirect()->route('footer.manage')->with($notification);
    }

}
