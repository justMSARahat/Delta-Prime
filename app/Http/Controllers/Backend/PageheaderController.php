<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Backend\pageheader;
use File;
use Image;

class PageheaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageheaders = pageheader::orderBy('title','asc')->paginate(15);
        return view('backend.pages.pageheader.manage',compact('pageheaders'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pageheader = pageheader::find($id);
        if( !is_null($pageheader) ){
            return view('backend.pages.pageheader.edit',compact('pageheader'));
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
                'breadcrumbs'   => 'required',
            ],
            [
                'title.required'        => 'Please Insert Title',
                'breadcrumbs.required'       => 'Please Insert Breadcrumb ',
            ],
        );

        $pageheader =  pageheader::find($id);

        $pageheader->title          = $request->title;
        $pageheader->breadcrumbs    = $request->breadcrumbs;
        $pageheader->visibility     = $request->visibility;

        $pageheader->tab            = $request->tab;
        $pageheader->meta_title     = $request->meta_title;
        $pageheader->description    = $request->description;
        $pageheader->tag            = $request->tag;

        if($request->image){

            if( file::exists('Backend/Image/pageheader/' .$pageheader->image) ){
                file::delete('Backend/Image/pageheader/' .$pageheader->image);
            }

            $image = $request->file('image');
            $img   = rand().'_'.'pageheader'.'_'.'Updated'.'_'.$image->getClientOriginalExtension();
            $loc   = public_path('Backend/Image/Pageheader/'.$img);
            Image::make($image)->save($loc);
            $pageheader->image   = $img;
        }

        $pageheader->save();
        $notification = array(
            'message' => 'Information Updated',
            'alert-type' => 'success'
        );
        return redirect()->route('header.manage')->with($notification);

    }

}
