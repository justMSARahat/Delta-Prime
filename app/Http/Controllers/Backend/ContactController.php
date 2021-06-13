<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\contactinfo;
use App\Models\Backend\contact;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info = contactinfo::orderBy('id','asc')->get();
        return view('backend.pages.info.manage',compact('info'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $info = contactinfo::find($id);
        if( !is_null($info) ){
            return view('backend.pages.info.edit',compact('info'));
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

        $info =  contactinfo::find($id);

        $info->email        = $request->email;
        $info->phone_one    = $request->phone_one;
        $info->phone_two    = $request->phone_two;
        $info->address      = $request->address;
        $info->description  = $request->description;
        $info->facebook     = $request->facebook;
        $info->twitter      = $request->twitter;
        $info->behance      = $request->behance;
        $info->dribbble     = $request->dribbble;
        $info->map_api      = $request->map_api;

        $info->save();
        return redirect()->route('contact.manage');
    }

}
