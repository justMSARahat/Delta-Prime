<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;
use App\Models\Backend\cart;
use App\Models\Backend\order;
use App\Models\Backend\order_item;
use Auth;

class PayPalController extends Controller
{
    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */
    public function payment()
    {
        $provider = new ExpressCheckout;


        $invoiceID = rand();
        $data = $this->cartData($invoiceID);



        $response = $provider->setExpressCheckout($data);

        return redirect($response['paypal_link']);
    }

    protected function cartData($invoiceID){
        $data = [];
        $data['items'] = [];
        foreach( cart::totalCarts() as $key=>$item ){
            $itemdetails=[
                'name' => $item->product->title ,
                'price' =>'Description for ItSolutionStuff.com',
                'desc'  => 'Description for ItSolutionStuff.com',
                'qty' => 1
            ];
        };

        $data['invoice_id'] = $invoiceID;
        $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
        $data['return_url'] = route('payment.success');
        $data['cancel_url'] = route('payment.cancel');

        $data['total'] = cart::totalPrice();

        return $data;
    }

    public function cancel()
    {
        dd('Your payment is canceled. You can create cancel page here.');
    }

    public function success(Request $request)
    {
        $provider = new ExpressCheckout;

        $token  = $request->token;
        $PrayerID= $request->PrayerID;

        $response   = $provider->getExpressCheckoutDetails($token);

        $invoiceID = $response['INVNUM']&&rand();
        $data   = $this->cartdata($invoiceID);

        $response   = $provider->doExpressCheckoutPayment($data, $token, $PrayerID);

        // order::store();


        // $order = new order();

        // if( Auth::guard('customer')->check() ){
        //     $cart = Cart::where('user_id', Auth::guard('customer')->user()->id )->where('product_id',$request->product_id)->first();
        // }
        // else{
        //     $cart = Cart::where('ip_address' , $request->ip() )->where('product_id',$request->product_id)->first();
        // }

        // if( Auth::guard('customer')->check() ){
        //     $order->user_id = Auth::guard('customer')->user()->id;
        //     $order->ip_address  = $request->ip();
        // }
        // else{
        //     $order->ip_address = $request->ip();
        // }

        // $order->ip_address  = $request->ip();
        // $order->country     = $request->country;
        // $order->name        = $request->name;
        // $order->last_name   = $request->last_name;
        // $order->address_one = $request->address_one;
        // $order->address_two = $request->address_two;
        // $order->city        = $request->city;
        // $order->state       = $request->state;
        // $order->post_code   = $request->post_code;

        // $order->amount      = $data['total'];

        // $order->email       = $request->email;
        // $order->phone       = $request->phone;
        // $order->status      = 1;
        // $order->note        = $request->note;

        // $order->invoice     = $invoiceID;

        // $order->save();

        return "Order Placed";
    }
}
