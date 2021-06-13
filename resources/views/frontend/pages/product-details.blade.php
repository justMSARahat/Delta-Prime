@extends('frontend.layout.template_2')
@section('meta')
    @foreach ( App\Models\Backend\pageheader::orderBy('title','asc')->where('page','product-details')->get() as $header )
        <title>{{ $header->tab }}</title>
        <meta name="title" content="{{ $header->meta_title }}">
        <meta name="description" content="{{ $header->description }}">
        <meta name="tag" content="{{ $header->tag }}">
    @endforeach
@endsection
@section('body')
<!-- page title area start -->
@foreach ( App\Models\Backend\pageheader::orderBy('title','asc')->where('page','product-details')->get() as $header )
@if ( $header->visibility == 1 )
<section class="page__title p-relative d-flex align-items-center"
    style="background-image: url('{{ asset('Backend/Image/Pageheader/'.$header->image) }}')" width="1920px"
    height="530">
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


<!-- shop details area start -->
<section class="shop__area pb-65">
    <div class="shop__top grey-bg-6 pt-100 pb-90">
        <div class="container">
            <div class="row">
                {{-- <div class="col-xl-6 col-lg-6">
                        <div class="product__modal-box d-flex">
                            <div class="product__modal-nav mr-20">
                                <nav>
                                    <div class="nav nav-tabs" id="product-details" role="tablist">
                                        <a class="nav-item nav-link active" id="pro-one-tab" data-toggle="tab" href="#pro-one" role="tab" aria-controls="pro-one" aria-selected="true">
                                        <div class="product__nav-img w-img">
                                            <img src="{{ asset('Backend/Image/Product/'. $value->primary ) }}" alt=""
                height="600" width="470">
            </div>
            </a>
            <a class="nav-item nav-link" id="pro-two-tab" data-toggle="tab" href="#pro-two" role="tab"
                aria-controls="pro-two" aria-selected="false">
                <div class="product__nav-img w-img">
                    <img src="{{ asset('Backend/Image/Product/'. $value->second_image) }}" alt="">
                </div>
            </a>
            <a class="nav-item nav-link" id="pro-three-tab" data-toggle="tab" href="#pro-three" role="tab"
                aria-controls="pro-three" aria-selected="false">
                <div class="product__nav-img w-img">
                    <img src="{{ asset('Backend/Image/Product/'. $value->third_image ) }}" alt="">
                </div>
            </a>
        </div>
        </nav>
    </div>
    <div class="tab-content mb-20" id="product-detailsContent">
        <div class="tab-pane fade show active" id="pro-one" role="tabpanel" aria-labelledby="pro-one-tab">
            <div class="product__modal-img product__thumb w-img">
                <img src="assets/img/shop/product/details/details-big-1.jpg" alt="">
                <div class="product__sale ">
                    <span class="new">new</span>
                    <span class="percent">-16%</span>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="pro-two" role="tabpanel" aria-labelledby="pro-two-tab">
            <div class="product__modal-img product__thumb w-img">
                <img src="assets/img/shop/product/details/details-big-2.jpg" alt="">
                <div class="product__sale ">
                    <span class="new">new</span>
                    <span class="percent">-16%</span>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="pro-three" role="tabpanel" aria-labelledby="pro-three-tab">
            <div class="product__modal-img product__thumb w-img">
                <img src="assets/img/shop/product/details/details-big-3.jpg" alt="">
                <div class="product__sale ">
                    <span class="new">new</span>
                    <span class="percent">-16%</span>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div> --}}
    <div class="col-xl-6 col-lg-6">
        <div class="product__modal-box d-flex">
            <div class="product__modal-nav mr-20">
                <nav>
                    <div class="nav nav-tabs" id="product-details" role="tablist">
                        <a class="nav-item nav-link active" id="pro-one-tab" data-toggle="tab" href="#pro-one"
                            role="tab" aria-controls="pro-one" aria-selected="true">
                            <div class="product__nav-img w-img">
                                <img src="{{ asset('Backend/Image/Product/'.$value->primary) }}" alt=""
                                    class="slide_image" width="102px" height="130px">
                            </div>
                        </a>

                        @if ( !is_null($value->second_image) )
                        <a class="nav-item nav-link" id="pro-two-tab" data-toggle="tab" href="#pro-two" role="tab"
                            aria-controls="pro-two" aria-selected="false">
                            <div class="product__nav-img w-img">
                                <img src="{{ asset('Backend/Image/Product/'.$value->second_image) }}"
                                    class="slide_image" alt="" width="102px" height="130px">
                            </div>
                        </a>
                        @endif

                        @if ( !is_null($value->third_image) )
                        <a class="nav-item nav-link " id="pro-three-tab" data-toggle="tab" href="#pro-three" role="tab"
                            aria-controls="pro-three" aria-selected="false">
                            <div class="product__nav-img w-img">
                                <img src="{{ asset('Backend/Image/Product/'.$value->third_image) }}" class="slide_image"
                                    alt="" width="102px" height="130px">
                        </a>
                        @endif


                    </div>
                </nav>
            </div>
            <div class="tab-content mb-20" id="product-detailsContent">
                <div class="tab-pane fade active show" id="pro-one" role="tabpanel" aria-labelledby="pro-one-tab">
                    <div class="product__modal-img product__thumb w-img">
                        <img src="{{ asset('Backend/Image/Product/'.$value->primary) }}" alt="" height="600px"
                            width="470px">
                        @if ( !is_null($value->offer_price) )
                        @php
                        $discount = ($value->price-$value->offer_price)/$value->price*100;
                        $percent = round($discount);
                        @endphp
                        <div class="product__sale ">
                            <span class="new">Sale</span>
                            <span class="percent">-{{ $percent }}%</span>
                        </div>
                        @endif
                    </div>
                </div>
                @if ( !is_null($value->second_image) )
                <div class="tab-pane fade" id="pro-two" role="tabpanel" aria-labelledby="pro-two-tab">
                    <div class="product__modal-img product__thumb w-img">
                        <img src="{{ asset('Backend/Image/Product/'.$value->second_image) }}" alt="" height="600px"
                            width="470px">
                        @if ( !is_null($value->offer_price) )
                        @php
                        $discount = ($value->price-$value->offer_price)/$value->price*100;
                        $percent = round($discount);
                        @endphp
                        <div class="product__sale ">
                            <span class="new">Sale</span>
                            <span class="percent">-{{ $percent }}%</span>
                        </div>
                        @endif
                    </div>
                </div>
                @endif
                @if ( !is_null($value->third_image) )
                <div class="tab-pane fade " id="pro-three" role="tabpanel" aria-labelledby="pro-three-tab">
                    <div class="product__modal-img product__thumb w-img">
                        <img src="{{ asset('Backend/Image/Product/'.$value->third_image) }}" alt="" height="600px"
                            width="470px">
                        @if ( !is_null($value->offer_price) )
                        @php
                        $discount = ($value->price-$value->offer_price)/$value->price*100;
                        $percent = round($discount);
                        @endphp
                        <div class="product__sale ">
                            <span class="new">Sale</span>
                            <span class="percent">-{{ $percent }}%</span>
                        </div>
                        @endif
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

    <div class="col-xl-6 col-lg-6">
        <div class="product__modal-content product__modal-content-2">
            <h4><a href="product-details.html">{{ $value->title }}</a></h4>
            <div class="rating rating-shop mb-15">
                <ul>
                    <li><span><i class="fas fa-star"></i></span></li>
                    <li><span><i class="fas fa-star"></i></span></li>
                    <li><span><i class="fas fa-star"></i></span></li>
                    <li><span><i class="fas fa-star"></i></span></li>
                    <li><span><i class="fas fa-star"></i></span></li>
                </ul>
                <span class="rating-no ml-10 rating-left">
                    {{ $review_all->count() }} rating(s)
                </span>
            </div>
            <div class="product__price-2 mb-25">
                @if ( !is_null($value->offer_price) )
                    <span>{{ $webinfo->currency_icon }} {{ $value->offer_price }} {{ $webinfo->currency }}</span>
                    <span class="old-price">{{ $webinfo->currency_icon }}  {{ $value->price }}  {{ $webinfo->currency }}</span>
                @else
                    <span>{{ $webinfo->currency_icon }} {{ $value->price }} {{ $webinfo->currency }}</span>
                @endif
            </div>
            <div class="product__modal-des mb-30">
                <p>{!! $value->short_desc !!}</p>
            </div>
            <div class="product__modal-form mb-30">
                <form action="{{ route('cart.store') }}" method="POST">
                    @csrf
                    @if ( !is_null( $value->size ) )
                    <div class="product__modal-input size mb-20">
                        <label>Size <i class="fas fa-star-of-life"></i></label>
                        <select name="size">
                            @foreach ($size as $size)
                            <option value="{{ $size }}"> @if( $size == 1 ) S @endif @if( $size == 2 ) M @endif @if(
                                $size == 3 ) L @endif @if( $size == 4 ) XL @endif @if( $size == 5 ) XXL @endif @if(
                                $size == 6 ) XXXL @endif</option>
                            @endforeach
                        </select>
                    </div>
                    @endif
                    @if ( !is_null( $value->color ) )
                    <div class="product__modal-input color mb-20">
                        <label>Color <i class="fas fa-star-of-life"></i></label>
                        <select name="color">
                            @foreach ($color_s as $color_s)
                                @foreach ( App\Models\Backend\color::orderBy('title','asc')->where('id',$color_s)->get() as
                                $color_info)
                                {{ $color_info->title }}
                                <option value="{{ $color_info->id }}">{{ $color_info->title }}</option>
                                @endforeach
                            @endforeach

                        </select>
                    </div>
                    @endif
                    @if ( !is_null( $value->color ) && !is_null( $value->size ) )
                    <div class="product__modal-required mb-5">
                        <span>Repuired Fiields *</span>
                    </div>

                    @elseif ( is_null( $value->color ) && !is_null( $value->size ) )
                    <div class="product__modal-required mb-5">
                        <span>Repuired Fiields *</span>
                    </div>
                    @elseif ( !is_null( $value->color ) && is_null( $value->size ) )
                    <div class="product__modal-required mb-5">
                        <span>Repuired Fiields *</span>
                    </div>
                    @elseif ( is_null( $value->color ) && is_null( $value->size ) )
                    <div class="product__modal-required mb-5" style="display: none">
                        <span>Repuired Fiields *</span>
                    </div>
                    @endif
                    <div class="pro-quan-area d-sm-flex align-items-center">
                        <div class="product-quantity-title">
                            <label>Quantity</label>
                        </div>
                        <div class="product-quantity mr-20 mb-20">
                            <div class="cart-plus-minus">
                                <input type="text" value="1" name="product_quantity" />
                            </div>
                        </div>
                        <div class="pro-cart-btn">
                            <input type="hidden" name="product_id" value="{{ $value->id }}">
                            <button type="submit" class="add-cart-btn mb-20" style="">+ ADD TO CART</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="product__tag mb-25">
                <span>Category:</span>
                <form action="{{ route('category.search.product') }}" method="get" style="display: inline">
                    {{-- <span><a href="#">{{ $value->category_name->title }}</a></span> --}}
                    <input type="hidden" name="category" value="{{ $value->category_name->slug }}">
                    <button type="submit"
                        style="background: none; color:#606060">{{ $value->category_name->title }}</button>
                    <li>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    <div class="shop__bottom">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="product__details-tab">
                        <div class="product__details-tab-nav text-center mb-45">
                            <nav>
                                <div class="nav nav-tabs justify-content-start justify-content-sm-center"
                                    id="pro-details" role="tablist">
                                    <a class="nav-item nav-link active" id="des-tab" data-toggle="tab" href="#des"
                                        role="tab" aria-controls="des" aria-selected="true">Description</a>
                                    <a class="nav-item nav-link" id="add-tab" data-toggle="tab" href="#add" role="tab"
                                        aria-controls="add" aria-selected="false">Additional Information</a>
                                    <a class="nav-item nav-link" id="review-tab" data-toggle="tab" href="#review"
                                        role="tab" aria-controls="review" aria-selected="false">Reviews ({{ $review_all->count() }})</a>
                                </div>
                            </nav>
                        </div>
                        <div class="tab-content" id="pro-detailsContent">
                            <div class="tab-pane fade show active" id="des" role="tabpanel">
                                <div class="product__details-des">
                                    <p>
                                        {!! $value->desc !!}
                                    </p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="add" role="tabpanel">
                                <div class="product__details-add">
                                    <ul>
                                        <li><span>Weight</span></li>
                                        <li><span>{{ $value->weight }} KG</span></li>
                                        <li><span>Dimention</span></li>
                                        <li><span>{{ $value->dimention }} cm</span></li>
                                        <li><span>Stock</span></li>
                                        <li><span>{{ $value->quantity }} Piece </span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="review" role="tabpanel">
                                <div class="product__details-review">
                                    <div class="postbox__comments">
                                        <div class="postbox__comment-title mb-30">
                                            <h3>Reviews ({{ $review_all->count() }})</h3>
                                        </div>
                                        <div class="latest-comments mb-30">
                                            <ul>

                                                @foreach ( $review_all as $item )
                                                    <li>
                                                        <div class="comments-box">
                                                            <div class="comments-avatar">
                                                                <img src="assets/img/blog/comments/avater-1.png" alt="">
                                                            </div>
                                                            <div class="comments-text">
                                                                <div class="avatar-name">
                                                                    <h5>{{ $item->customer_name->name }} {{ $item->customer_name->last_name }}</h5>
                                                                    <span> - {{ $item->created_at->format('F j, Y') }} </span>
                                                                </div>
                                                                <div class="user-rating">
                                                                    <ul>
                                                                        @if ( $item->rating == 1 )
                                                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                                            <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                                            <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                                            <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                                            <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                                        @elseif ( $item->rating == 2 )
                                                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                                            <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                                            <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                                            <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                                        @elseif ( $item->rating == 3 )
                                                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                                            <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                                            <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                                        @elseif ( $item->rating == 4 )
                                                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                                            <li><a href="#"><i class="fal fa-star"></i></a></li>
                                                                        @elseif ( $item->rating == 5 )
                                                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                                        @endif
                                                                    </ul>
                                                                </div>
                                                                <p>{{ $item->message }}</p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endforeach


                                            </ul>
                                        </div>
                                    </div>
                                    @if( Auth::guard('customer')->check() )
                                        @if( !is_null($my_order) )
                                            @if ( $review_count == 0 )
                                                <div class="post-comments-form mb-100">
                                                    <div class="post-comments-title mb-30">
                                                        <h3>Your Review</h3>
                                                    </div>
                                                    <form id="contacts-form" class="conatct-post-form" action="{{ route('review.store') }}" method="Post">
                                                        @csrf
                                                        <div class="row">
                                                            <style>
                                                                .feedback{
                                                                    width: 100%;
                                                                    max-width: 780px;
                                                                    background: #fff;
                                                                    margin: 0 auto;
                                                                    padding: 15px;
                                                                    box-shadow: 1px 1px 16px rgba(0, 0, 0, 0.3);
                                                                }
                                                                .survey-hr{
                                                                margin:10px 0;
                                                                border: .5px solid #ddd;
                                                                }
                                                                .star-rating {
                                                                margin: 0px 17px 10px;
                                                                font-size: 0;
                                                                white-space: nowrap;
                                                                display: inline-block;
                                                                width: 175px;
                                                                height: 35px;
                                                                overflow: hidden;
                                                                position: relative;
                                                                background: url('data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IiB3aWR0aD0iMjBweCIgaGVpZ2h0PSIyMHB4IiB2aWV3Qm94PSIwIDAgMjAgMjAiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDIwIDIwIiB4bWw6c3BhY2U9InByZXNlcnZlIj48cG9seWdvbiBmaWxsPSIjREREREREIiBwb2ludHM9IjEwLDAgMTMuMDksNi41ODMgMjAsNy42MzkgMTUsMTIuNzY0IDE2LjE4LDIwIDEwLDE2LjU4MyAzLjgyLDIwIDUsMTIuNzY0IDAsNy42MzkgNi45MSw2LjU4MyAiLz48L3N2Zz4=');
                                                                background-size: contain;
                                                                }
                                                                .star-rating i {
                                                                opacity: 0;
                                                                position: absolute;
                                                                left: 0;
                                                                top: 0;
                                                                height: 100%;
                                                                width: 20%;
                                                                z-index: 1;
                                                                background: url('data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IiB3aWR0aD0iMjBweCIgaGVpZ2h0PSIyMHB4IiB2aWV3Qm94PSIwIDAgMjAgMjAiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDIwIDIwIiB4bWw6c3BhY2U9InByZXNlcnZlIj48cG9seWdvbiBmaWxsPSIjRkZERjg4IiBwb2ludHM9IjEwLDAgMTMuMDksNi41ODMgMjAsNy42MzkgMTUsMTIuNzY0IDE2LjE4LDIwIDEwLDE2LjU4MyAzLjgyLDIwIDUsMTIuNzY0IDAsNy42MzkgNi45MSw2LjU4MyAiLz48L3N2Zz4=');
                                                                background-size: contain;
                                                                }
                                                                .star-rating input {
                                                                -moz-appearance: none;
                                                                -webkit-appearance: none;
                                                                opacity: 0;
                                                                display: inline-block;
                                                                width: 20%;
                                                                height: 100%;
                                                                margin: 0;
                                                                padding: 0;
                                                                z-index: 2;
                                                                position: relative;
                                                                }
                                                                .star-rating input:hover + i,
                                                                .star-rating input:checked + i {
                                                                opacity: 1;
                                                                }
                                                                .star-rating i ~ i {
                                                                width: 40%;
                                                                }
                                                                .star-rating i ~ i ~ i {
                                                                width: 60%;
                                                                }
                                                                .star-rating i ~ i ~ i ~ i {
                                                                width: 80%;
                                                                }
                                                                .star-rating i ~ i ~ i ~ i ~ i {
                                                                width: 100%;
                                                                }
                                                                .choice {
                                                                position: fixed;
                                                                top: 0;
                                                                left: 0;
                                                                right: 0;
                                                                text-align: center;
                                                                padding: 20px;
                                                                display: block;
                                                                }
                                                                span.scale-rating{
                                                                margin: 5px 0 15px;
                                                                    display: inline-block;

                                                                    width: 100%;

                                                                }
                                                                span.scale-rating>label {
                                                                position:relative;
                                                                    -webkit-appearance: none;
                                                                outline:0 !important;
                                                                    border: 1px solid grey;
                                                                    height:33px;
                                                                    margin: 0 5px 0 0;
                                                                width: calc(10% - 7px);
                                                                    float: left;
                                                                cursor:pointer;
                                                                }
                                                                span.scale-rating label {
                                                                position:relative;
                                                                    -webkit-appearance: none;
                                                                outline:0 !important;
                                                                    height:33px;

                                                                    margin: 0 5px 0 0;
                                                                width: calc(10% - 7px);
                                                                    float: left;
                                                                cursor:pointer;
                                                                }
                                                                span.scale-rating input[type=radio] {
                                                                position:absolute;
                                                                    -webkit-appearance: none;
                                                                opacity:0;
                                                                outline:0 !important;
                                                                    /*border-right: 1px solid grey;*/
                                                                    height:33px;

                                                                    margin: 0 5px 0 0;

                                                                width: 100%;
                                                                    float: left;
                                                                cursor:pointer;
                                                                z-index:3;
                                                                }
                                                                span.scale-rating label:hover{
                                                                background:#fddf8d;
                                                                }
                                                                span.scale-rating input[type=radio]:last-child{
                                                                border-right:0;
                                                                }
                                                                span.scale-rating label input[type=radio]:checked ~ label{
                                                                    -webkit-appearance: none;

                                                                    margin: 0;
                                                                background:#fddf8d;
                                                                }
                                                                span.scale-rating label:before
                                                                {
                                                                content:attr(value);
                                                                    top: 7px;
                                                                    width: 100%;
                                                                    position: absolute;
                                                                    left: 0;
                                                                    right: 0;
                                                                    text-align: center;
                                                                    vertical-align: middle;
                                                                z-index:2;
                                                                }
                                                            </style>
                                                            <div  class="">
                                                                <span class="star-rating">
                                                                <input type="radio" name="rating1" value="1"><i></i>
                                                                <input type="radio" name="rating2" value="2"><i></i>
                                                                <input type="radio" name="rating3" value="3"><i></i>
                                                                <input type="radio" name="rating4" value="4"><i></i>
                                                                <input type="radio" name="rating5" value="5"><i></i>
                                                                </span>

                                                            </div>
                                                            <div class="col-xl-12">
                                                                <div class="contact-icon p-relative contacts-message">
                                                                    <textarea name="message" id="Write Your Review" cols="30" rows="10"
                                                                        placeholder="Comments" required></textarea>
                                                                </div>
                                                                <input type="hidden" name="product_id" value="{{ $value->id }}">
                                                            </div>
                                                            <div class="col-xl-12">
                                                                <button class="os-btn os-btn-black" type="submit">Post comment</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            @endif
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- shop details area end -->

<!-- related products area start -->
<section class="related__product pb-60">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                @foreach ( App\Models\Backend\headertitle::orderBy('title','asc')->where('position','trending')->get()
                as $info )
                <div class="section__title-wrapper text-center mb-55">
                    <div class="section__title mb-10">
                        <h2>{{ $info->title }}</h2>
                    </div>
                    <div class="section__sub-title">
                        <p>{{ $info->subtitle }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="row">
            @foreach ($trend as $item)
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="product__wrapper mb-60">
                    <div class="product__thumb">
                        <a href="{{ route('product.details', $item->slug) }}" class="w-img">
                            <img src="{{ asset('Backend/Image/Product/'. $item->primary) }}" alt="product-img"
                                height="344px" width="270px">
                        </a>
                        {{-- <div class="product__action transition-3">
                                    <form action="{{ route('wishlist.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $item->id }}">
                        <button type="submit" class="" style="background: none; color:black;"><i
                                class="fal fa-heart"></i></button>
                        </form>
                        <!-- Button trigger modal -->
                        <a href="javascript:void(0);" data-toggle="modal" data-target="#productModalId">
                            <i class="fal fa-search"></i>
                        </a>

                    </div> --}}
                    @if ( !is_null($item->offer_price) )
                    @php
                    $discount = ($item->price-$item->offer_price)/$item->price*100;
                    $percent = round($discount);
                    @endphp
                    <div class="product__sale ">
                        <span class="new">Sale</span>
                        <span class="percent">-{{ $percent }}%</span>
                    </div>
                    @endif
                </div>
                <div class="product__content p-relative">
                    <div class="product__content-inner">
                        <h4><a href="{{ route('product.details', $item->slug) }}">{{ $item->title }}</a></h4>
                        <div class="product__price transition-3">
                            @if ( !is_null($item->offer_price) )
                                <span>{{ $webinfo->currency_icon }} {{ $item->offer_price }} {{ $webinfo->currency }}</span>
                                <span class="old-price">{{ $webinfo->currency_icon }}  {{ $item->price }}  {{ $webinfo->currency }}</span>
                            @else
                                <span>{{ $webinfo->currency_icon }} {{ $item->price }} {{ $webinfo->currency }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="add-cart p-absolute transition-3">
                        <form action="{{ route('cart.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_quantity" value="1">
                            <input type="hidden" name="product_id" value="{{ $item->id }}">
                            <button type="submit" class="" style="background: none; color:black;">+ ADD TO CART</button>
                            {{-- <a href="{{ route( 'cart.add' ) }}">+ Add to Cart</a> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    </div>
</section>
<!-- related products area end -->

<!-- shop modal start -->
<!-- Modal -->
<div class="modal fade" id="productModalId" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered product-modal" role="document">
        <div class="modal-content">
            <div class="product__modal-wrapper p-relative">
                <div class="product__modal-close p-absolute">
                    <button data-dismiss="modal"><i class="fal fa-times"></i></button>
                </div>
                <div class="product__modal-inner">
                    <div class="row">
                        <div class="col-xl-5 col-lg-5 col-md-6 col-sm-12 col-12">
                            <div class="product__modal-box">
                                <div class="tab-content mb-20" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                        aria-labelledby="nav-home-tab">
                                        <div class="product__modal-img w-img">
                                            <img src="assets/img/shop/product/quick-view/quick-big-1.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                        aria-labelledby="nav-profile-tab">
                                        <div class="product__modal-img w-img">
                                            <img src="assets/img/shop/product/quick-view/quick-big-2.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-contact" role="tabpanel"
                                        aria-labelledby="nav-contact-tab">
                                        <div class="product__modal-img w-img">
                                            <img src="assets/img/shop/product/quick-view/quick-big-3.jpg" alt="">
                                        </div>
                                    </div>
                                </div>
                                <nav>
                                    <div class="nav nav-tabs justify-content-between" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab"
                                            href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">
                                            <div class="product__nav-img w-img">
                                                <img src="assets/img/shop/product/quick-view/quick-sm-1.jpg" alt="">
                                            </div>
                                        </a>
                                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab"
                                            href="#nav-profile" role="tab" aria-controls="nav-profile"
                                            aria-selected="false">
                                            <div class="product__nav-img w-img">
                                                <img src="assets/img/shop/product/quick-view/quick-sm-2.jpg" alt="">
                                            </div>
                                        </a>
                                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab"
                                            href="#nav-contact" role="tab" aria-controls="nav-contact"
                                            aria-selected="false">
                                            <div class="product__nav-img w-img">
                                                <img src="assets/img/shop/product/quick-view/quick-sm-3.jpg" alt="">
                                            </div>
                                        </a>
                                    </div>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-7 col-md-6 col-sm-12 col-12">
                            <div class="product__modal-content">
                                <h4><a href="product-details.html">Wooden container Bowl</a></h4>
                                <div class="rating rating-shop mb-15">
                                    <ul>
                                        <li><span><i class="fas fa-star"></i></span></li>
                                        <li><span><i class="fas fa-star"></i></span></li>
                                        <li><span><i class="fas fa-star"></i></span></li>
                                        <li><span><i class="fas fa-star"></i></span></li>
                                        <li><span><i class="fal fa-star"></i></span></li>
                                    </ul>
                                    <span class="rating-no ml-10">
                                        3 rating(s)
                                    </span>
                                </div>
                                <div class="product__price-2 mb-25">
                                    <span>$96.00</span>
                                    <span class="old-price">$96.00</span>
                                </div>
                                <div class="product__modal-des mb-30">
                                    <p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium
                                        lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram.
                                    </p>
                                </div>
                                <div class="product__modal-form">
                                    <form action="#">
                                        <div class="product__modal-input size mb-20">
                                            <label>Size <i class="fas fa-star-of-life"></i></label>
                                            <select>
                                                <option>- Please select -</option>
                                                <option> S</option>
                                                <option> M</option>
                                                <option> L</option>
                                                <option> XL</option>
                                                <option> XXL</option>
                                            </select>
                                        </div>
                                        <div class="product__modal-input color mb-20">
                                            <label>Color <i class="fas fa-star-of-life"></i></label>
                                            <select>
                                                <option>- Please select -</option>
                                                <option> Black</option>
                                                <option> Yellow</option>
                                                <option> Blue</option>
                                                <option> White</option>
                                                <option> Ocean Blue</option>
                                            </select>
                                        </div>
                                        <div class="product__modal-required mb-5">
                                            <span>Repuired Fiields *</span>
                                        </div>
                                        <div class="pro-quan-area d-lg-flex align-items-center">
                                            <div class="product-quantity-title">
                                                <label>Quantity</label>
                                            </div>
                                            <div class="product-quantity">
                                                <div class="cart-plus-minus"><input type="text" value="1" /></div>
                                            </div>
                                            <div class="pro-cart-btn ml-20">
                                                <a href="#" class="add-cart-btn mr-10">+ Add to Cart</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- shop modal end -->
@endsection
