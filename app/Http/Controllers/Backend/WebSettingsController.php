<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\webinfo;
use Image;
use File;

class WebSettingsController extends Controller
{
    public function info_show(){
        $infos   = webinfo::orderBy('id','desc')->first();
        return view('backend.pages.setings.info',compact('infos'));
    }
    public function payment_show(){
        return view('backend.pages.setings.payment');
    }
    public function edit(Request $request, $id){
        $info   = webinfo::find($id);
        if( !is_null($info) ){
            return view('backend.pages.setings.edit',compact('info'));
        }
        else{
            return back();
        }
    }

    public function update_payment(Request $request) {

        $this->putPermanentEnv('PAYPAL_CURRENCY', $request->PAYPAL_CURRENCY);
        $this->putPermanentEnv('PAYPAL_MODE', $request->PAYPAL_MODE);
        $this->putPermanentEnv('PAYPAL_SANDBOX_API_USERNAME', $request->PAYPAL_SANDBOX_API_USERNAME);
        $this->putPermanentEnv('PAYPAL_SANDBOX_API_PASSWORD', $request->PAYPAL_SANDBOX_API_PASSWORD);
        $this->putPermanentEnv('PAYPAL_SANDBOX_API_SECRET', $request->PAYPAL_SANDBOX_API_SECRET);
        $this->putPermanentEnv('PAYPAL_LIVE_API_USERNAME', $request->PAYPAL_LIVE_API_USERNAME);
        $this->putPermanentEnv('PAYPAL_LIVE_API_PASSWORD', $request->PAYPAL_LIVE_API_PASSWORD);
        $this->putPermanentEnv('PAYPAL_LIVE_API_SECRET', $request->PAYPAL_LIVE_API_SECRET);
        $this->putPermanentEnv('OMISE_PUBLIC_KEY', $request->OMISE_PUBLIC_KEY);
        $this->putPermanentEnv('OMISE_SECRET_KEY', $request->OMISE_SECRET_KEY);
        return redirect()->back();
    }

    public function update_info(Request $request,$id){

        $webinfo =  webinfo::find($id);

        $webinfo->title             = $request->title;
        $webinfo->description       = $request->description;
        $webinfo->site_url          = $request->site_url;
        $webinfo->currency          = $request->currency;
        $webinfo->currency_icon     = $request->currency_icon;

        if($request->logo){

            if( file::exists('Backend/Image/Website/' .$webinfo->logo) ){
                file::delete('Backend/Image/Website/' .$webinfo->logo);
            }

            $image = $request->file('logo');
            $img   = rand().'_'.'Website'.'_'.$request->title.'_'.'Updated'.'_'.$image->getClientOriginalExtension();
            $loc   = public_path('Backend/Image/Website/'.$img);
            Image::make($image)->save($loc);
            $webinfo->logo   = $img;
        }

        if($request->favicon){

            if( file::exists('Backend/Image/Website/' .$webinfo->favicon) ){
                file::delete('Backend/Image/Website/' .$webinfo->favicon);
            }

            $image = $request->file('favicon');
            $img   = rand().'_'.'favicon'.'_'.$request->title.'_'.'Updated'.'_'.$image->getClientOriginalExtension();
            $loc   = public_path('Backend/Image/Website/'.$img);
            Image::make($image)->save($loc);
            $webinfo->favicon   = $img;
        }

        $webinfo->save();
        return redirect()->route('info.show');
    }

    public function putPermanentEnv($key, $value)
    {
        $path = app()->environmentFilePath();

        $escaped = preg_quote('='.env($key), '/');

        file_put_contents($path, preg_replace(
            "/^{$key}{$escaped}/m",
            "{$key}={$value}",
            file_get_contents($path)
        ));
    }

    public function optimize_show(){
        return view('backend.pages.setings.optimize');
    }
}
