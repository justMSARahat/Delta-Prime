<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\featured;
use Illuminate\Support\Str;
use File;
use Image;


// title
// btn_text
// btn_link
// status
// image
class FeaturedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $featureds = featured::orderBy('id','desc')->paginate(15);
        return view('backend.pages.featured.manage',compact('featureds'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.featured.create');
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
                'btn_text'  => 'required',
                'btn_link'  => 'required',
                'status'    => 'required',
                'image'     => 'required',
            ],
            [
                'title.required'        => 'Please Insert Title',
                'status.required'       => 'Please Select featured Status ',
                'btn_text.required'     => 'Please Insert Button Text',
                'btn_link.required'     => 'Please Insert Button Link',
                'image.required'        => 'Please Insert featured Image',
            ],

        );


        $featured =  new featured();

        $featured->title          = $request->title;
        $featured->slug           = Str::slug($request->title);
        $featured->btn_text       = $request->btn_text;
        $featured->btn_link       = $request->btn_link;
        $featured->status         = $request->status;

        if($request->image){
            $image = $request->file('image');
            $img   = rand().'_'.'featured-Image'.'_'.$image->getClientOriginalExtension();
            $loc   = public_path('Backend/Image/Featured/'.$img);
            Image::make($image)->save($loc);
            $featured->image   = $img;
        }

        $featured->save();
        return redirect()->route('feature.manage');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $featured = featured::find($id);
        if( !is_null($featured) ){
            return view('backend.pages.featured.edit',compact('featured'));
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
                'btn_text'  => 'required',
                'btn_link'  => 'required',
                'status'    => 'required',
            ],
            [
                'title.required'        => 'Please Insert Title',
                'status.required'       => 'Please Select featured Status ',
                'btn_text.required'     => 'Please Insert Button Text',
                'btn_link.required'     => 'Please Insert Button Link',
            ],
        );

        $featured =  featured::find($id);

        $featured->title          = $request->title;
        $featured->slug           = Str::slug($request->title);
        $featured->btn_text       = $request->btn_text;
        $featured->btn_link       = $request->btn_link;
        $featured->status         = $request->status;

        if($request->image){

            if( file::exists('Backend/Image/Featured/' .$featured->image) ){
                file::delete('Backend/Image/Featured/' .$featured->image);
            }

            $image = $request->file('image');
            $img   = rand().'_'.'featured-Image'.'_'.$image->getClientOriginalExtension();
            $loc   = public_path('Backend/Image/Featured/'.$img);
            Image::make($image)->save($loc);
            $featured->image   = $img;
        }

        $featured->save();
        return redirect()->route('feature.manage');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $featured = featured::find($id);
        if( !is_null($featured) ){
            if( file::exists('Backend/Image/Featured/' .$featured->image) ){
                file::delete('Backend/Image/Featured/' .$featured->image);
            }
            $featured->delete();
            return redirect()->route('feature.manage');
        }
        else{
            return back();
        }
    }
}
