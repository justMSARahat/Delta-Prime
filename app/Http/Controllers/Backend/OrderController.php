<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\cart;
use App\Models\Backend\order;
use App\Models\Backend\order_item;
use App\Models\Backend\webinfo;
use Auth;
use Srmklive\PayPal\Services\ExpressCheckout;
use Illuminate\Support\Facades\Http;
use OmiseCharge;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\OrderImport;
use App\Exports\OrderExport;
class OrderController extends Controller
{

    public function index(Request $request)
    {
        $webinfo    = webinfo::orderBy('id','asc')->first();
        if( Auth::guard('customer')->check() ){
            $total_item = cart::orderBy('id','desc')->where('order_id',Null)->where('user_id',Auth::guard('customer')->user()->id )->where('ip_address', $request->ip() )->get();
        }else{
            $total_item = cart::orderBy('id','desc')->where('order_id',Null)->where('ip_address', $request->ip() )->get();
        }
        $cart       = cart::totalPrice();
        if( !is_null($total_item) ){
            if( $cart != 0 ){
                return view('frontend.pages.checkout',compact('total_item','webinfo') );
            }
            else{
                return redirect()->route('cart.manage');
            }
        }
        else{
            return redirect()->route('cart.manage');
        }
        return view('frontend.pages.checkout',compact('webinfo'));
    }
    public function store(Request $request)
    {
        $request->validate(
            [
                'name'              => 'required',
                'email'             => 'required',
                'phone'             => 'required',
                'address_one'       => 'required',
                'city'              => 'required',
                'state'             => 'required',
                'country'           => 'required',
                'post_code'         => 'required',
                'payment_method'    => 'required',
            ],
            [
                'payment_method.required'=> 'Please select payment gateway',
            ]);
            $invoiceID = rand();
            if($request->payment_method=="paypal") {
                $this->insertOrder($request,1,$invoiceID);
                $provider = new ExpressCheckout;
                $data = $this->cartData($invoiceID);
                $response = $provider->setExpressCheckout($data,true);
                return redirect($response['paypal_link']);
            }elseif($request->payment_method=="omise") {
                $total_price=cart::totalPrice()*100;
                $this->insertOrder($request,2,$invoiceID);
                $request->validate(['otoken'=> 'required',],['otoken.required'=> 'Invalid Token',]);
                require_once dirname(__FILE__).'/lib/autoload.php';
                define('OMISE_PUBLIC_KEY', env('OMISE_PUBLIC_KEY'));
                define('OMISE_SECRET_KEY', env('OMISE_SECRET_KEY'));
                $charge = OmiseCharge::create(array('amount'=> $total_price,'currency'=> 'USD','card'=> $request->otoken,'description' => "Order #".rand()." Invoice"));
                if($charge['capture'] && $charge['paid'] && $charge['status']=="successful") {
                    $order=order::where('invoice',$invoiceID)->firstOrFail();
                    $order->payment=1;
                    $order->save();
                    if ( Auth::guard('customer')->check() ) {
                        cart::where(['user_id'=>Auth::guard('customer')->user()->id,'ip_address'=>$request->ip()])->delete();
                    }
                    else{
                        cart::where('ip_address',$request->ip())->delete();
                    }
                    $notification =array(
                        'message' => 'Congratulation! Order Placed!',
                        'alert-type' => 'success'
                    );

                    return redirect()->route('home')->with($notification);
                } else {
                    $order=order::where('invoice',$invoiceID)->first();
                    if($order) {$order->status=4;$order->payment=3;$order->save();}
                    $notification =array(
                        'message' => 'Payment Cancelled!',
                        'alert-type' => 'error'
                    );
                    return redirect()->route('home')->with($notification);
                }
            }
        $notification =array(
            'message' => 'Invalid Payment Method!',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);

    }

    private function insertOrder($request,$method,$invoiceID) {
        $order = new order();
        if( Auth::guard('customer')->check() ){
            $cart = Cart::where('user_id', Auth::guard('customer')->user()->id)->where('product_id',$request->product_id)->first();
        }
        else{
            $cart = Cart::where('ip_address' , $request->ip() )->where('product_id',$request->product_id)->first();
        }

        if( Auth::guard('customer')->check() ){
            $order->user_id = Auth::guard('customer')->user()->id;
            $order->ip_address  = $request->ip();
        }
        else{
            $order->ip_address = $request->ip();
        }

        $order->ip_address  = $request->ip();
        $order->country     = $request->country;
        $order->name        = $request->name;
        $order->last_name   = $request->last_name;
        $order->address_one = $request->address_one;
        $order->address_two = $request->address_two;
        $order->city        = $request->city;
        $order->state       = $request->state;
        $order->post_code   = $request->post_code;
        $order->amount      = $request->amount;
        $order->email       = $request->email;
        $order->phone       = $request->phone;
        $order->status      = 1;
        $order->note        = $request->note;
        $order->invoice     = $invoiceID;
        $order->payment_method = $method;
        $order->payment = 2;

        $order->save();

        foreach( cart::totalCarts() as $cart ){
            $cart->order_id = $order->id;
            $cart->invoice = $order->invoice;

            if( Auth::guard('customer')->check() ){
                $cart->user_id = Auth::guard('customer')->user()->id;
            }
            else{
                $cart->ip_address = $request->ip();
            }

            $cart->save();
        }


        if ( Auth::guard('customer')->check() ) {
            $cart_item = cart::Where('user_id', Auth::guard('customer')->user()->id )->get();
        }
        else{
            $cart_item = cart::Where('ip_address', request()->ip() )->get();
        }

        foreach( $cart_item as $cart_item ){

            $OrderItem = new order_item();

            if ( Auth::guard('customer')->check() ) {
                $OrderItem->user_id          = Auth()->guard('customer')->user()->id;
            }
            $OrderItem->ip               = $request->ip();
            $OrderItem->invoice          = $order->invoice;
            $OrderItem->order_id         = $order->id;
            $OrderItem->product_id       = $cart_item->product_id;
            $OrderItem->product_quantity = $cart_item->product_quantity;
            $OrderItem->size             = $cart_item->size;
            $OrderItem->color            = $cart_item->color;

            $OrderItem->save();
        }

    }
    public function show($id)
    {
        $order = order::find($id);
        $webinfo    = webinfo::orderBy('id','asc')->first();
        if( !is_null( $order ) ){
            return view('backend.pages.order.invoice',compact('order','webinfo'));
        }
        else{
            return back();
        }
    }
    public function update(Request $request, $id)
    {
        $order = order::find($id);
        if( !is_null( $order ) ){
            $order->status  = 4;
            $order->save();

            $notification =array(
                'message' => 'Order Canceled!',
                'alert-type' => 'warning'
            );
            return redirect()->back()->with($notification);
        }
        else{
            return back();
        }
    }
    public function complete(Request $request, $id)
    {
        $order = order::find($id);
        if( !is_null( $order ) ){
            $order->status  = 3;
            $order->save();

            $notification = array(
                'message' => 'Order Completed',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.order.complete')->with($notification);
        }
        else{
            return back();
        }
    }
    public function shiped(Request $request, $id)
    {
        $order = order::find($id);
        if( !is_null( $order ) ){
            $order->status  = 2;
            $order->save();

            $notification = array(
                'message' => 'Order Shipped',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.order.pending')->with($notification);
        }
        else{
            return back();
        }
    }
    public function destroy(Request $request, $id)
    {
        $order = order::find($id);
        if( !is_null( $order ) ){
            $order->status  = 4;
            $order->save();

            $notification = array(
                'message' => 'Order Canceled',
                'alert-type' => 'danger'
            );
            return redirect()->route('admin.order.cancel')->with($notification);
        }
        else{
            return back();
        }
    }

    protected function cartData($invoiceID){
        $data = [];
        $data['items'] = [];
        foreach( cart::totalCarts() as $key=>$item ){
            $itemdetails=[
                'name' => $item->product->title ,
                'price' =>(!is_null($item->product->offer_price))?$item->product->offer_price:$item->product->price,
                'desc'  => $item->product->short_desc,
                'qty' => $item->product_quantity
            ];
            array_push($data['items'], $itemdetails);
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
        $provider = new ExpressCheckout;
        $token  = request()->token;
        $response   = $provider->getExpressCheckoutDetails($token);
        $invoiceID = $response['INVNUM'];
        $order=order::where('invoice',$invoiceID)->first();
        if($order) {$order->status=4;$order->payment=3;$order->save();}
        $notification =array(
            'message' => 'Payment Cancelled!',
            'alert-type' => 'error'
        );
        return redirect()->route('home')->with($notification);
    }

    public function success(Request $request)
    {
        $provider = new ExpressCheckout;
        $token  = $request->token;
        $PrayerID= $request->PrayerID;

        $response   = $provider->getExpressCheckoutDetails($token);
        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
            $invoiceID = $response['INVNUM'];
            $data   = $this->cartdata($invoiceID);
            $response   = $provider->doExpressCheckoutPayment($data, $token, $PrayerID);
            $order=order::where('invoice',$invoiceID)->firstOrFail();
            $order->payment=1;
            $order->save();
            if ( Auth::guard('customer')->check() ) {
                cart::where(['user_id'=>Auth::guard('customer')->user()->id,'ip_address'=>$request->ip()])->delete();
            }
            else{
                cart::where('ip_address',$request->ip())->delete();
            }
            $notification =array(
                'message' => 'Congratulation! Order Placed!',
                'alert-type' => 'success'
            );

            return redirect()->route('home')->with($notification);
        }
        return redirect(route('payment.cancel'));

    }

    /**
        * @return \Illuminate\Support\Collection
    */
    public function fileImportExport()
    {
        return view('backend.pages.import');
    }

    /**
        * @return \Illuminate\Support\Collection
    */
    public function fileImport(Request $request)
    {
        Excel::import(new OrderImport, $request->file('file')->store('temp'));
        return back();
    }

    /**
        * @return \Illuminate\Support\Collection
    */
    public function fileExport()
    {
        return Excel::download(new OrderExport, 'Orders.xlsx');
    }
}
