<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\state;
use App\Models\Backend\country;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $state = state::orderBy('country','asc')->paginate(15);
        return view('backend.pages.state.manage',compact('state'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $country = country::orderBy('priority','asc')->get();
        return view('backend.pages.state.create',compact('country'));
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
                'country'    => 'required',
            ],
            [
                'name.required'         => 'Please Insert Title',
                'country.required'       => 'Please Select Country',
                'status.required'       => 'Please Select featured Status ',
            ],

        );
        $state = new state();
        $state->name     = $request->name;
        $state->country  = $request->country;
        $state->status   = $request->status;

        $state->save();
        $notification = array(
            'message' => 'New Location Added',
            'alert-type' => 'success'
        );
        return redirect()->route('state.manage')->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $country = country::orderBy('priority','asc')->get();
        $state = state::find($id);
        if (!is_null($state) ) {
            return view('backend.pages.state.edit',compact('state','country') );
        }
        else{
            return redirect()->route('state.manage');
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
                'country'    => 'required',
            ],
            [
                'name.required'         => 'Please Insert Title',
                'country.required'       => 'Please Select Country',
                'status.required'       => 'Please Select featured Status ',
            ],

        );

        $state = state::find($id);

        $state->name     = $request->name;
        $state->country  = $request->country;
        $state->status   = $request->status;

        $state->save();
        $notification = array(
            'message' => 'Location Updated',
            'alert-type' => 'success'
        );
        return redirect()->route('state.manage')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $state = state::find($id);

        if (!is_null($state)) {
            $state->delete();
            $notification = array(
                'message' => 'Location Removed',
                'alert-type' => 'danger'
            );
            return redirect()->route('state.manage')->with($notification);
        }
        else{
            return redirect()->route('state.manage');
        }

    }
}
