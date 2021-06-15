<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\brand;
use App\Models\Backend\category;
use App\Models\Backend\post;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PostImport;
use App\Exports\PostExport;
use File;
use Image;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = post::orderBy('id','desc')->paginate(15);
        return view('backend.pages.post.manage',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brand = brand::orderBy('title','asc')->get();
        return view('backend.pages.post.create',compact('brand'));
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
                'category'  => 'required',
                'brand'     => 'required',
                'status'    => 'required',
                'image'     => 'required',
                'comment_opt' => 'required',
            ],
            [
                'title.required'        => 'Please Insert Title',
                'desc.required'         => 'Please Insert Descrioption',
                'category.required'     => 'Please Select Category',
                'brand.required'        => 'Please Select Brand',
                'status.required'       => 'Please Select post Status ',
                'image.required'        => 'Please Insert A Image',
                'price.required'        => 'Please Insert Price',
                'comment_opt.required'  => 'Please Insert Comment Option',
            ],

        );

        $post =  new post();
        $post->title          = $request->title;
        $post->slug           = Str::slug($request->title);
        $post->desc           = $request->desc;
        $post->category       = $request->category;
        $post->brand          = $request->brand;
        $post->status         = $request->status;
        $post->comment_opt    = $request->comment_opt;
        $post->tag            = $request->tag;
        $post->author         = 1;

        if($request->image){
            $image = $request->file('image');
            $img   = rand().'_'.'Post_thumbnail'.'_'.$image->getClientOriginalExtension();
            $loc   = public_path('Backend/Image/Post/'.$img);
            Image::make($image)->save($loc);
            $post->image   = $img;
        }

        $post->save();

        $notification = array(
            'message' => 'New Post Published',
            'alert-type' => 'success'
        );
        return redirect()->route('post.manage')->with($notification);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = brand::orderBy('title','asc')->get();
        $post = post::find($id);
        if( !is_null($post) ){
            return view('backend.pages.post.edit',compact('post','brand'));
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

        $post =  post::find($id);

        $post->title          = $request->title;
        $post->slug           = Str::slug($request->title);
        $post->short_desc     = $request->short;
        $post->desc           = $request->desc;
        $post->price          = $request->price;
        $post->offer_price    = $request->offer;
        $post->quantity       = $request->quantity;
        $post->sku            = $request->sku;
        $post->status         = $request->status;
        $post->brand          = $request->brand;
        $post->category       = $request->category;

        if($request->primary){

            if( file::exists('Backend/Image/post/' .$post->primary) ){
                file::delete('Backend/Image/post/' .$post->primary);
            }

            $image = $request->file('primary');
            $img   = rand().'_'.'post_Main_Image'.'_'.'Updated'.'_'.$image->getClientOriginalExtension();
            $loc   = public_path('Backend/Image/post/'.$img);
            Image::make($image)->save($loc);
            $post->primary   = $img;
        }
        if($request->second_image){

            if( file::exists('Backend/Image/post/' .$post->second_image) ){
                file::delete('Backend/Image/post/' .$post->second_image);
            }

            $image = $request->file('second_image');
            $img   = rand().'_'.'post_second_image'.'_'.$request->title.'_'.'Updated'.'_'.$image->getClientOriginalExtension();
            $loc   = public_path('Backend/Image/post/'.$img);
            Image::make($image)->save($loc);
            $post->second_image   = $img;
        }
        if($request->third_image){

            if( file::exists('Backend/Image/post/' .$post->third_image) ){
                file::delete('Backend/Image/post/' .$post->third_image);
            }

            $image = $request->file('third_image');
            $img   = rand().'_'.'post_third_image'.'_'.$request->title.'_'.'Updated'.'_'.$image->getClientOriginalExtension();
            $loc   = public_path('Backend/Image/post/'.$img);
            Image::make($image)->save($loc);
            $post->third_image   = $img;
        }

        $post->save();

        $notification = array(
            'message' => 'Post Updated',
            'alert-type' => 'success'
        );
        return redirect()->route('post.manage')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = post::find($id);
        if( !is_null($post) ){
            if( file::exists('Backend/Image/post/' .$post->primary) ){
                file::delete('Backend/Image/post/' .$post->primary);
            }
            if( file::exists('Backend/Image/post/' .$post->second_image) ){
                file::delete('Backend/Image/post/' .$post->second_image);
            }
            if( file::exists('Backend/Image/post/' .$post->third_image) ){
                file::delete('Backend/Image/post/' .$post->third_image);
            }
            $post->delete();

            $notification = array(
                'message' => 'Post Removed',
                'alert-type' => 'danger'
            );
            return redirect()->route('post.manage')->with($notification);
        }
        else{
            return back();
        }
    }

    /**
        * @return \Illuminate\Support\Collection
    */
    public function fileImportExport()
    {
        return view('backend.pages.import');
    }

    /**
        * @return \Illuminate\Support\Collection
    */
    public function fileImport(Request $request)
    {
        Excel::import(new PostImport, $request->file('file')->store('temp'));
        return back();
    }

    /**
        * @return \Illuminate\Support\Collection
    */
    public function fileExport()
    {
        return Excel::download(new PostExport, 'Posts.xlsx');
    }
}
