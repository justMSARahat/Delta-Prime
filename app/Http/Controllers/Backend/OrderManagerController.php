<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\order;
use App\Models\Backend\webinfo;

class OrderManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pending()
    {
        $orders  = order::orderBy('id','desc')->where( 'status' , 1 )->orWhere( 'status' , 2 )->paginate(15);
        $webinfo    = webinfo::orderBy('id','asc')->first();
        return view('backend.pages.order.manage',compact('orders','webinfo'));
    }
    public function complete()
    {
        $orders  = order::orderBy('id','desc')->where( 'status' , 3 )->paginate(15);
        $webinfo    = webinfo::orderBy('id','asc')->first();
        return view('backend.pages.order.manage',compact('orders','webinfo'));
    }
    public function cancel()
    {
        $orders  = order::orderBy('id','desc')->where( 'status' , 4 )->paginate(15);
        $webinfo    = webinfo::orderBy('id','asc')->first();
        return view('backend.pages.order.manage',compact('orders','webinfo'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
