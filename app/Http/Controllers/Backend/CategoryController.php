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

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorys = category::orderBy('id','desc')->where('parent',0)->paginate(15);
        return view('backend.pages.category.manage',compact('categorys'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.category.create');
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
                'status'    => 'required',
            ],
            [
                'title.required'        => 'Please Insert Title',
                'status.required'       => 'Please Select Product Status ',
            ],

        );

        $category =  new category();

        $category->title          = $request->title;
        $category->slug           = Str::slug($request->title);
        $category->parent         = $request->parent;
        $category->status         = $request->status;
        $category->logo           = $request->logo;
        $category->feature        = $request->feature;

        $category->save();
        $notification = array(
            'message' => 'New Category Published',
            'alert-type' => 'success'
        );
        return redirect()->route('cat.manage')->with($notification);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = category::find($id);
        if( !is_null($category) ){
            return view('backend.pages.category.edit',compact('category'));
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

        $category =  category::find($id);


        $category->title          = $request->title;
        $category->slug           = Str::slug($request->title);
        $category->parent         = $request->parent;
        $category->status         = $request->status;
        $category->logo           = $request->logo;
        $category->feature        = $request->feature;

        $category->save();
        $notification = array(
            'message' => 'Category Updated',
            'alert-type' => 'success'
        );
        return redirect()->route('cat.manage')->with($notification);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = category::find($id);
        if( !is_null($category) ){
            $category->delete();
            $notification = array(
                'message' => 'Category Deleted',
                'alert-type' => 'danger'
            );
            return redirect()->route('cat.manage')->with($notification);
        }
        else{
            return back();
        }
    }
}
