<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\menu;
use App\Models\Backend\menu_opt;
use Illuminate\Support\Str;
use File;
use Image;
   
class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu   = menu::orderBy('priority','asc')->get();
        return view('backend.pages.menu.manage',compact('menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $p_priority = menu::orderBy('priority','asc');
        $p_count  = $p_priority->count();
        return view('backend.pages.menu.create',compact('p_priority','p_count'));
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
                'link'      => 'required',
                'priority'  => 'required',
            ],
            [
                'title.required'        => 'Please Insert Title',
                'link.required'       => 'Please Insert Link ',
                'priority.required'       => 'Please Select Priority',
            ],

        );

        $menu =  new menu();

        $menu->title          = $request->title;
        $menu->slug           = Str::slug($request->title);
        $menu->link           = $request->link;
        $menu->priority       = $request->priority;

        $menu->save();
        return redirect()->route('menu.manage');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu = menu::find($id);
        if( !is_null($menu) ){
            return view('backend.pages.menu.edit',compact('menu'));
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
                'link'      => 'required',
                'priority'  => 'required',
            ],
            [
                'title.required'        => 'Please Insert Title',
                'link.required'       => 'Please Insert Link ',
                'priority.required'       => 'Please Select Priority',
            ],

        );

        $menu =  menu::find($id);

        $menu->title          = $request->title;
        $menu->slug           = Str::slug($request->title);
        $menu->link           = $request->link;
        $menu->priority       = $request->priority;

        $menu->save();
        return redirect()->route('menu.manage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = menu::find($id);
        if( !is_null($menu) ){
            $menu->delete();
            return redirect()->route('menu.manage');
        }
        else{
            return back();
        }
    }

}
