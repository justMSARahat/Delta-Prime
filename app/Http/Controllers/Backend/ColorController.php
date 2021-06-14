<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\color;
use Illuminate\Support\Str;
use File;
use Image;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colors = color::orderBy('id','desc')->get();
        return view('backend.pages.color.manage',compact('colors'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.color.create');
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
            ],
            [
                'title.required'        => 'Please Insert Color Name',
            ],

        );

        $color =  new color();

        $color->title          = $request->title;

        $color->save();
        $notification = array(
            'message' => 'New Color Added',
            'alert-type' => 'success'
        );
        return redirect()->route('color.manage')->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $color = color::find($id);
        if( !is_null($color) ){
            return view('backend.pages.color.edit',compact('color'));
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
            ],
            [
                'title.required'        => 'Please Insert Title',
            ],

        );

        $color =  color::find($id);

        $color->title          = $request->title;

        $color->save();
        $notification = array(
            'message' => 'Color Updated',
            'alert-type' => 'success'
        );
        return redirect()->route('color.manage')->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $color = color::find($id);
        if( !is_null($color) ){
            $color->delete();
            $notification = array(
                'message' => 'Color Removed',
                'alert-type' => 'danger'
            );
            return redirect()->route('color.manage')->with($notification);
        }
        else{
            return back();
        }
    }
}
