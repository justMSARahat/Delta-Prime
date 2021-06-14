<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\state;
use App\Models\Backend\city;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $city = city::orderBy('state','asc')->paginate(15);
        return view('backend.pages.city.manage',compact('city'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $state = state::orderBy('id','asc')->get();
        return view('backend.pages.city.create',compact('state'));
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
                'name'     => 'required',
                'status'    => 'required',
                'state'    => 'required',
            ],
            [
                'name.required'         => 'Please Insert Title',
                'state.required'       => 'Please Select state',
                'status.required'       => 'Please Select featured Status ',
            ],

        );
        $city = new city();
        $city->name     = $request->name;
        $city->state    = $request->state;
        $city->status   = $request->status;

        $city->save();
        $notification = array(
            'message' => 'New Location Added',
            'alert-type' => 'success'
        );
        return redirect()->route('city.manage')->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $state = state::orderBy('id','asc')->get();
        $city = city::find($id);
        if (!is_null($city) ) {
            return view('backend.pages.city.edit',compact('city','state') );
        }
        else{
            return redirect()->route('city.manage');
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
                'name'     => 'required',
                'status'    => 'required',
                'state'    => 'required',
            ],
            [
                'name.required'         => 'Please Insert Title',
                'state.required'       => 'Please Select state',
                'status.required'       => 'Please Select featured Status ',
            ],

        );

        $city = city::find($id);

        $city->name     = $request->name;
        $city->state  = $request->state;
        $city->status   = $request->status;

        $city->save();
        $notification = array(
            'message' => 'Location Updated',
            'alert-type' => 'success'
        );
        return redirect()->route('city.manage')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city = city::find($id);

        if (!is_null($city)) {
            $city->delete();
            $notification = array(
                'message' => 'Location Removed',
                'alert-type' => 'danger'
            );
            return redirect()->route('city.manage')->with($notification);
        }
        else{
            return redirect()->route('city.manage');
        }

    }
}
