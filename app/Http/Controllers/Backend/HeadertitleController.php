<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Backend\headertitle;
use File;
use Image;

class HeadertitleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $heading = headertitle::orderBy('title','asc')->paginate(15);
        return view('backend.pages.heading.manage',compact('heading'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $heading = headertitle::find($id);
        if( !is_null($heading) ){
            return view('backend.pages.heading.edit',compact('heading'));
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
                'subtitle'   => 'required',
            ],
            [
                'title.required'        => 'Please Insert Title',
                'subtitle.required'       => 'Please Insert Subtitle ',
            ],
        );

        $heading =  headertitle::find($id);

        $heading->title          = $request->title;
        $heading->subtitle       = $request->subtitle;
        $heading->position       = $request->position;

        $heading->save();
        return redirect()->route('heading.manage');

    }

}
