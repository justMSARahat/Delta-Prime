@extends('frontend.layout.template_2')
@section('meta')
    @foreach ( App\Models\Backend\pageheader::orderBy('title','asc')->where('page','Checkout')->get() as $header )
        <title>{{ $header->tab }}</title>
        <meta name="title" content="{{ $header->meta_title }}">
        <meta name="description" content="{{ $header->description }}">
        <meta name="tag" content="{{ $header->tag }}">
    @endforeach
@endsection
@section('body')


    <!-- page title area start -->
    @foreach ( App\Models\Backend\pageheader::orderBy('title','asc')->where('page','Checkout')->get() as $header )
        @if ( $header->visibility == 1 )
            <section class="page__title p-relative d-flex align-items-center" style="background-image: url('{{ asset('Backend/Image/Pageheader/'.$header->image) }}')" width="1920px" height="530">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="page__title-inner text-center">
                                <h1>{{ $header->title }}</h1>
                                <div class="page__title-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb justify-content-center">
                                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page"> {{ $header->breadcrumbs }}</li>
                                    </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
    @endforeach

    <!-- checkout-area start -->
    <section class="checkout-area pb-100 pt-100">
        <div class="container">
            <form action="{{ route('order.submit') }}" method="POST" id="checkout">
                @csrf
                <div class="row">
                    @if($errors->any())
                        {!! implode('', $errors->all('<div class="col-12 alert alert-danger alert-dismissible fade show" role="alert">:message<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>')) !!}
                    @endif
                    <div class="col-lg-6">
                        <div class="checkbox-form">
                            <h3>Billing Details</h3>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Country <span class="required">*</span></label>
                                        <select class="form-control" name="country" required>
                                            <option disabled selected> Your City </option>
                                            @foreach ( App\Models\Backend\country::orderBy('priority','asc')->where('status',1)->get() as $item )
                                                <option @if ( Auth::guard('customer')->check() ) @if( $item->id == Auth::guard('customer')->user()->country )selected @endif @endif
                                                 value="{{ $item->id }}"> {{ $item->name }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>First Name <span class="required">*</span></label>
                                        <input type="text" placeholder="First Name"
                                        value="@if ( Auth::guard('customer')->check() ) {{Auth::guard('customer')->user()->name}} @endif" name="name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Last Name <span class="required">*</span></label>
                                        <input type="text" placeholder="Last Name"
                                        value="@if ( Auth::guard('customer')->check() ) {{Auth::guard('customer')->user()->last_name}} @endif" name="last_name" >
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Address <span class="required">*</span></label>
                                        <input type="text" placeholder="Address"
                                        value="@if ( Auth::guard('customer')->check() ) {{Auth::guard('customer')->user()->address_one}} @endif" name="address_one" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Additional Address</label>
                                        <input type="text" placeholder="Additional Address "
                                        value="@if ( Auth::guard('customer')->check() ) {{Auth::guard('customer')->user()->address_two}} @endif" name="address_two" >
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Town / City <span class="required">*</span></label>
                                        <select name="city" class="form-control" id="" required>
                                            <option disabled selected> Your City </option>
                                            @foreach ( App\Models\Backend\city::orderBy('state','asc')->where('status',1)->get() as $item )
                                                <option @if ( Auth::guard('customer')->check() ) @if( $item->id == Auth::guard('customer')->user()->city )selected @endif @endif
                                                    value="{{ $item->id }}"> {{ $item->name }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>State / Region <span class="required">*</span></label>
                                        <select name="state" class="form-control" id="" required>
                                            <option disabled selected> Your State </option>
                                            @foreach ( App\Models\Backend\state::orderBy('country','asc')->where('status',1)->get() as $item )
                                                <option @if ( Auth::guard('customer')->check() ) @if( $item->id == Auth::guard('customer')->user()->state )selected @endif @endif
                                                    value="{{ $item->id }}"> {{ $item->name }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Postcode / Zip <span class="required">*</span></label>
                                        <input type="text" placeholder="Post Code"
                                        value="@if ( Auth::guard('customer')->check() ) {{Auth::guard('customer')->user()->post_code}} @endif" name="post_code" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Email Address <span class="required">*</span></label>
                                        <input type="email" placeholder="Email Address"
                                        value="@if ( Auth::guard('customer')->check() ) {{Auth::guard('customer')->user()->email}} @endif" name="email" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Phone <span class="required">*</span></label>
                                        <input type="text" placeholder="Phone Number"
                                        value="@if ( Auth::guard('customer')->check() ) {{Auth::guard('customer')->user()->phone}} @endif" name="phone" required>
                                    </div>
                                </div>
                                <hr>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Note</label>
                                        <textarea name="note" class="form-control" id="" cols="30" rows="3" placeholder="Addisional Note"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="your-order mb-30 ">
                            <h3>Your order</h3>
                            <div class="your-order-table table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-name">Product</th>
                                            <th class="product-total">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( App\Models\Backend\cart::totalCarts() as $item)
                                            <tr class="cart_item">
                                                <td class="product-name">
                                                    {{ $item->product->title }} <strong class="product-quantity"> × {{ $item->product_quantity }}</strong>
                                                </td>
                                                <td class="product-total">
                                                    <span class="amount">
                                                        @if ( !is_null($item->product->offer_price) )
                                                            {{ $webinfo->currency_icon }} {{ $item->product->offer_price }} {{ $webinfo->currency }}
                                                        @else
                                                            {{ $webinfo->currency_icon }} {{ $item->product->price }} {{ $webinfo->currency }}
                                                        @endif
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr class="cart-subtotal">
                                            <th>Cart Subtotal</th>
                                            <td><span class="amount">{{ $webinfo->currency_icon }} {{ App\Models\Backend\cart::totalPrice() }} {{ $webinfo->currency }}</span></td>
                                        </tr>
                                        <tr class="order-total">
                                            <th>Order Total</th>
                                            <td><strong><span class="amount">{{ $webinfo->currency_icon }} {{ App\Models\Backend\cart::totalPrice() }} {{ $webinfo->currency }}</span></strong>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                            <div class="payment-method">
                                <div class="accordion" id="accordionExample">
                                    <div class="card">
                                        <div class="card-header" id="headingTwo">
                                            <h5 class="mb-0">
                                                <button class="btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                    Payment Methods
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label><input type="radio" name="payment_method" value="paypal" > Pay {{ $webinfo->currency_icon }} {{ App\Models\Backend\cart::totalPrice() }} {{ $webinfo->currency }} from Paypal</label>
                                                </div>
                                                <div class="form-group">
                                                    <label><input type="radio" name="payment_method" value="omise" > Pay {{ $webinfo->currency_icon }} {{ App\Models\Backend\cart::totalPrice() }} {{ $webinfo->currency }} from Omise</label>
                                                </div>
                                                <input type="hidden" name="otoken" id="otoken" value="" />
                                                <!-- <a href="{{ route('payment') }}" class="btn btn-success">Pay ${{ App\Models\Backend\cart::totalPrice() }} from Paypal</a> -->
                                                <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Pay ${{ App\Models\Backend\cart::totalPrice() }} from Omise</button> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="order-button-payment mt-20">
                                    <input type="hidden" name="amount" value="{{ App\Models\Backend\cart::totalPrice() }}">
                                    <button type="submit" class="os-btn os-btn-black">Place order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Pay with Omise</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="post" id="ocheckout">
            @csrf
              <div class="modal-body">
                    <div id="token_errors" class="badge badge-warning col-12">please input a card detail</div>
                    <input type="hidden" name="omise_token">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Card Holder Name</label>
                                <input type="text" class="form-control" data-omise="holder_name" value="" placeholder="Enter card holder name" required>
                            </div>
                            <div class="form-group">
                                <label>Card Number</label>
                                <input type="text" class="form-control" data-omise="number" value="" placeholder="Enter 16 digit number" required>
                            </div>
                            <div class="form-group">
                                <label>Card Date Experiment</label>
                                <div class="d-flex">
                                <input type="text" class="form-control" data-omise="expiration_month" size="4" value="" placeholder="MM" style="width: 50%;"><span class="pl-1 pr-1" style="font-size: 20px;padding-top: 0.3em;">/</span>
                                <input style="width: 50%;" type="text" class="form-control" data-omise="expiration_year" size="8" value="" placeholder="YYYY">
                                </div>
                            </div>
                            <div class="form-group"><label>Security Code</label>
                                <input type="text" class="form-control" placeholder="Ex. 123" data-omise="security_code" size="8" value="">
                            </div>
                            <span class="omise-circle" style=""></span>
                        </div>
                    </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" value="Pay ${{ App\Models\Backend\cart::totalPrice() }}">
              </div>
          </form>
        </div>
      </div>
    </div>
    <script src="{{ url('Frontend/assets/js/jquery-1.11.2.min.js') }}"></script>
    <script src="https://cdn.omise.co/omise.js"></script>
    <script>
        $('#checkout').submit(function(e){
            if($('input[name=payment_method]:checked').val()=='omise' && $('#otoken').val()==''){
                e.preventDefault();
                $('#exampleModalCenter').modal('show');
            }
        });
        Omise.setPublicKey("{!! env('OMISE_PUBLIC_KEY') !!}");
        $("#ocheckout").submit(function () {
            $("#token_errors").html('submitting...');
            var form = $(this);
            form.find("input[type=submit]").prop("disabled", true);
            var card = {
                "name": form.find("[data-omise=holder_name]").val(),
                "number": form.find("[data-omise=number]").val(),
                "expiration_month": form.find("[data-omise=expiration_month]").val(),
                "expiration_year": form.find("[data-omise=expiration_year]").val(),
                "security_code": form.find("[data-omise=security_code]").val()
            };
            Omise.createToken("card", card, function (statusCode, response) {
                if (response.object == "error") {
                    $("#token_errors").html(response.message);
                    form.find("input[type=submit]").prop("disabled", false);
                } else {
                    form.find("[name=omise_token]").val(response.id);
                    $('#otoken').val(response.id);
                    $("#token_errors").addClass('success').html('Tokenize succeed...');
                    $('#checkout').get(0).submit();
                };
            });
            return false;
        });
    </script>
@endsection
