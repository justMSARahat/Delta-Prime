@extends('frontend.layout.template_2')
@section('meta')
    @foreach ( App\Models\Backend\pageheader::orderBy('title','asc')->where('page','cart')->get() as $header )
        <title>{{ $header->tab }}</title>
        <meta name="title" content="{{ $header->meta_title }}">
        <meta name="description" content="{{ $header->description }}">
        <meta name="tag" content="{{ $header->tag }}">
    @endforeach
@endsection
@section('body')

    <!-- page title area start -->
    @foreach ( App\Models\Backend\pageheader::orderBy('title','asc')->where('page','cart')->get() as $header )
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
    <!-- page title area end -->
    <!-- Cart Area Strat-->
    <section class="cart-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                        <div class="table-content table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="product-thumbnail">Images</th>
                                        <th class="cart-product-name" width="30%">Product</th>
                                        <th class="product-price">Unit Price</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-remove">Action</th>
                                        <th class="product-subtotal">Total</th>
                                        <th class="product-remove">Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ( App\Models\Backend\cart::totalCarts() as $items )
                                        <tr>
                                            <td class="product-thumbnail"><a href="{{ route('product.details', $items->product->slug) }}"><img src="{{ asset('Backend/Image/Product/'.$items->product->primary) }}" alt=""></a></td>
                                            <td class="product-name"><a href="{{ route('product.details', $items->product->slug) }}">{{ $items->product->title }}</a></td>
                                            <td class="product-price"><span class="amount">
                                                @if ( !is_null($items->offer_price) )
                                                    {{ $webinfo->currency_icon }} {{ $items->product->offer_price }} {{ $webinfo->currency }}
                                                @else
                                                    {{ $webinfo->currency_icon }} {{ $items->product->price }} {{ $webinfo->currency }}
                                                @endif
                                                </span>
                                            </td>

                                            <form action="{{route('cart.update',$items->id)}}" method="POST">
                                                @csrf
                                                <td class="product-quantity">
                                                    <div class="cart-plus-minus"><input type="text" name="product_quantity" value="{{ $items->product_quantity }}" /></div>
                                                </td>
                                                <td class="product-remove">
                                                    <button class="os-btn os-btn-black" name="update_cart" type="submit">Update</button>
                                                </td>
                                            </form>

                                            <td class="product-subtotal"><span class="amount">

                                                @if ( !is_null($items->offer_price) )
                                                    {{ $webinfo->currency_icon }} {{ $items->product->offer_price * $items->product_quantity }} {{ $webinfo->currency }}
                                                @else
                                                    {{ $webinfo->currency_icon }} {{ $items->product->price * $items->product_quantity }} {{ $webinfo->currency }}
                                                @endif
                                                </span>
                                            </td>
                                            <td class="product-remove">
                                                {{-- <a href="#"><i class="fa fa-times"></i></a> --}}
                                                <form action="{{route('cart.delete',$items->id)}}" method="POST">
                                                    @csrf
                                                    <button style="background: none" type="submit">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    <form action="#">
                        <div class="row">
                            <div class="col-md-5 ml-auto">
                                <div class="cart-page-total">
                                    <h2>Cart totals</h2>
                                    <ul class="mb-20">
                                        <li>Subtotal <span>{{ $webinfo->currency_icon }} {{ App\Models\Backend\cart::totalPrice() }} {{ $webinfo->currency }}</span></li>
                                        <li>Total <span>{{ $webinfo->currency_icon }} {{ App\Models\Backend\cart::totalPrice() }} {{ $webinfo->currency }}</span></li>
                                    </ul>
                                    <a class="os-btn" href="{{ route('checkout.page') }}">Proceed to checkout</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
