<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\baner;
use Illuminate\Support\Str;
use File;
use Image;

class BanerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $baners = baner::orderBy('id','desc')->paginate(15);
        return view('backend.pages.baner.manage',compact('baners'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.baner.create');
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
                'subtitle'  => 'required',
                'price'     => 'required',
                'status'    => 'required',
                'image'     => 'required',
                'position'  => 'required',
            ],
            [
                'title.required'        => 'Please Insert Title',
                'subtitle.required'     => 'Please Insert Sub Title',
                'price.required'        => 'Please Insert Price',
                'status.required'       => 'Please Select Baner Status ',
                'position.required'     => 'Please Select Baner Position ',
                'desc.required'         => 'Please Insert Description',
                'btn_text.required'     => 'Please Insert Button Text',
                'btn_link.required'     => 'Please Insert Button Link',
                'image.required'        => 'Please Insert baner Image',
            ],

        );


        $baner =  new baner();

        $baner->title          = $request->title;
        $baner->slug           = Str::slug( $request->title);
        $baner->desc           = $request->desc;
        $baner->subtitle       = $request->subtitle;
        $baner->price          = $request->price;
        $baner->btn_text       = $request->btn_text;
        $baner->btn_link       = $request->btn_link;
        $baner->status         = $request->status;
        $baner->position       = $request->position;

        if($request->image){
            $image = $request->file('image');
            $img   = rand().'_'.'baner-Image'.'_'.$request->title.'_'.$image->getClientOriginalExtension();
            $loc   = public_path('Backend/Image/Baner/'.$img);
            Image::make($image)->save($loc);
            $baner->image   = $img;
        }

        $baner->save();

        $notification = array(
            'message' => 'Baner Created',
            'alert-type' => 'success'
        );

        return redirect()->route('baner.manage')->with($notification);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $baner = baner::find($id);
        if( !is_null($baner) ){
            return view('backend.pages.baner.edit',compact('baner'));
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
                'subtitle'  => 'required',
                'price'     => 'required',
                'status'    => 'required',
                'position'  => 'required',
            ],
            [
                'title.required'        => 'Please Insert Title',
                'subtitle.required'     => 'Please Insert Sub Title',
                'price.required'        => 'Please Insert Price',
                'status.required'       => 'Please Select Baner Status ',
                'position.required'     => 'Please Select Baner Position ',
                'desc.required'         => 'Please Insert Description',
                'btn_text.required'     => 'Please Insert Button Text',
                'btn_link.required'     => 'Please Insert Button Link',
            ],
        );

        $baner =  baner::find($id);

        $baner->title          = $request->title;
        $baner->desc           = $request->desc;
        $baner->subtitle       = $request->subtitle;
        $baner->price          = $request->price;
        $baner->btn_text       = $request->btn_text;
        $baner->btn_link       = $request->btn_link;
        $baner->status         = $request->status;
        $baner->position       = $request->position;

        if($request->image){

            if( file::exists('Backend/Image/Baner/' .$baner->image) ){
                file::delete('Backend/Image/Baner/' .$baner->image);
            }

            $image = $request->file('image');
            $img   = rand().'_'.'baner-Image'.'_'.$request->title.'_'.$image->getClientOriginalExtension();
            $loc   = public_path('Backend/Image/Baner/'.$img);
            Image::make($image)->save($loc);
            $baner->image   = $img;
        }

        $baner->save();
        
        $notification = array(
            'message' => 'Baner Successfully Updated',
            'alert-type' => 'success'
        );

        return redirect()->route('baner.manage')->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $baner = baner::find($id);
        if( !is_null($baner) ){
            if( file::exists('Backend/Image/Baner/' .$baner->image) ){
                file::delete('Backend/Image/Baner/' .$baner->image);
            }
            $baner->delete();
            $notification = array(
                'message' => 'Baner Deleted',
                'alert-type' => 'danger'
            );
            return redirect()->route('baner.manage')->with($notification);
        }
        else{
            return back();
        }
    }
}
