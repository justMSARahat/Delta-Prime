<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Backend\order;
use App\Models\Backend\order_item;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use File;
use Image;
use Auth;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ( Auth::guard('customer')->check() ) {

            $order          = order::where('user_id', Auth::guard('customer')->user()->id )->where('ip_address', $request->ip() )->get();
            return view('frontend.pages.account',compact('order'));
        }
        else{
            return redirect()->route('login.form');
        }
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

    }

    public function profile(Request $request, $id)
    {

        $id         = Auth::guard('customer')->user()->id;
        $customer   = customer::find($id);

        $customer->name      = $request->name;
        $customer->last_name = $request->last_name;
        $customer->email     = $request->email;
        $customer->phone     = $request->phone;

        if($request->image){

            if( file::exists('Backend/Image/User/' .$customer->image) ){
                file::delete('Backend/Image/User/' .$customer->image);
            }

            $image = $request->file('image');
            $img   = rand().'_'.'Customer_Profile_Image'.'_'.'Updated'.'_'.$image->getClientOriginalExtension();
            $loc   = public_path('Backend/Image/User/'.$img);
            Image::make($image)->save($loc);
            $customer->image   = $img;
        }

        $customer->save();
        
        $notification = array(
            'message' => 'User Information Updated',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function address(Request $request, $id)
    {


        $id         = Auth::guard('customer')->user()->id;
        $customer   = customer::find($id);

        $customer->address_one  = $request->address_one;
        $customer->address_two  = $request->address_two;
        $customer->city         = $request->city;
        $customer->post_code    = $request->post_code;
        $customer->country      = $request->country;
        $customer->state        = $request->state;

        $customer->save();
        
        $notification = array(
            'message' => 'User Information Updated',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function password(Request $request, $id)
    {

            $id   = Auth::guard('customer')->user()->id;
            $user = customer::find($id);

            $this->validate($request, [
                'oldpassword'     => 'required',
                'newpassword' => 'confirmed|max:8|different:password',
            ]);

            if (Hash::check($request->newpassword, $user->password)) {
            $user->fill(['password' => Hash::make($request->new_password)])->save();
                dd('Password Changed'); exit();
                $request->session()->flash('success', 'Password changed');
                return redirect()->back();
            } else {

                dd('Password Dosent Change'); exit();
                $request->session()->flash('error', 'Password does not match');
                return redirect()->back();
            }



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
