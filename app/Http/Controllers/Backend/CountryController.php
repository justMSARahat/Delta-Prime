<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\country;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $country = country::orderBy('priority','asc')->paginate(15);
        return view('backend.pages.country.manage',compact('country'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.country.create');
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
                'priority'  => 'required',
                'status'    => 'required',
            ],
            [
                'name.required'         => 'Please Insert Title',
                'priority.required'     => 'Please Select Priority',
                'status.required'       => 'Please Select featured Status ',
            ],

        );
        $country = new country();
        $country->name     = $request->name;
        $country->priority = $request->priority;
        $country->status   = $request->status;

        $country->save();
        return redirect()->route('country.manage');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $country = country::find($id);
        if (!is_null($country) ) {
            return view('backend.pages.country.edit',compact('country') );
        }
        else{
            return redirect()->route('country.manage');
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
            'priority'  => 'required',
            'status'    => 'required',
        ],
        [
            'name.required'         => 'Please Insert Title',
            'priority.required'     => 'Please Select Priority',
            'status.required'       => 'Please Select featured Status ',
        ]);

        $country = country::find($id);

        $country->name     = $request->name;
        $country->priority = $request->priority;
        $country->status   = $request->status;

        $country->save();
        return redirect()->route('country.manage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $country = country::find($id);

        if (!is_null($country)) {
            $country->delete();
            return redirect()->route('country.manage');
        }
        else{
            return redirect()->route('country.manage');
        }

    }
}
