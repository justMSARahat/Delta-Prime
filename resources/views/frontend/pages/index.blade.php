@extends('frontend.layout.template')
@section('meta')

    @php
        $webinfo    = App\Models\Backend\webinfo::orderBy('id','asc')->first();
    @endphp

    <meta name="title" content="{{ $webinfo->title }}">
    <meta name="description" content="{{ $webinfo->description }}">
    <title>{{ $webinfo->title }} - {{ $webinfo->description }}</title>

    @foreach ( App\Models\Backend\pageheader::orderBy('title','asc')->where('page','home')->get() as $header )
        <meta name="tag" content="{{ $header->tag }}">
    @endforeach

@endsection
@section('body')

<!-- slider area start -->
<section class="slider__area p-relative">
	<div class="slider-active">
		@foreach ($slider as $slider)
		<div class="single-slider slider__height d-flex align-items-center"
			style="background-image: url(' {{ asset('Backend/Image/Slider/') }}/{{ $slider->image }} ')">
			<div class="container">
				<div class="row">
					<div class="col-xl-6 col-lg-6 col-md-8 col-sm-10 col-12">
						<div class="slider__content">
							<h2 data-animation="fadeInUp" data-delay=".2s">{!! $slider->title !!}</h2>
							<p data-animation="fadeInUp" data-delay=".4s">{!! $slider->desc !!}</p>
							<a href="{{ $slider->btn_link }}" class="os-btn os-btn-2" data-animation="fadeInUp"
								data-delay=".6s">{{ $slider->btn_text }}</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		@endforeach
	</div>
</section>
<!-- slider area end -->
<!-- banner area start -->
<div class="banner__area">
	<div class="container">
		<div class="banner__inner p-relative mt--95">
			<div class="row">
                @foreach ($featured as $item)
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="banner__item mb-30 p-relative">
                            <div class="banner__thumb fix">
                                <a href="{{ $item->btn_link }}" class="w-img"><img
                                    src="{{ asset('Backend/Image/Featured/'. $item->image) }}"
                                    alt="banner"></a>
                            </div>
                            <div class="banner__content p-absolute transition-3">
                                <h5><a href="{{ $item->btn_link }}">{{ $item->title }}</a></h5>
                                <a href="{{ $item->btn_link }}" class="link-btn">{{ $item->btn_text }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach

			</div>
		</div>
	</div>
</div>
<!-- banner area end -->
<!-- product area start -->
<section class="product__area pt-60 pb-100">
	<div class="container">
		<div class="row">
			<div class="col-xl-12">
                @foreach ( App\Models\Backend\headertitle::orderBy('title','asc')->where('position','trending')->get() as $info )
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
			<div class="col-xl-12">
				<div class="product__slider owl-carousel">
					@foreach ($trend as $item)
					<div class="product__item">
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
                                        <button type="submit" class="" style="background: none; color:black;"><i class="fal fa-heart"></i></button>
                                    </form>
									<!-- Button trigger modal -->
									<a href="#" data-toggle="modal" data-target="#productModalId">
									<i class="fal fa-search"></i>
									</a>
								</div> --}}
							</div>
							<div class="product__content p-relative">
								<div class="product__content-inner">
									<h4><a href="{{ route('product.details', $item->slug) }}">{{ $item->title }}</a></h4>
									<div class="product__price transition-3">
										@if ( !is_null($item->offer_price) )
                                            <span>{{ $webinfo->currency_icon }} {{ $item->offer_price }} {{ $webinfo->currency }}</span>
                                            <span class="old-price">${{ $item->price }}</span>
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
				<div class="product__slider owl-carousel">
					@foreach ($trend_two as $item)
					<div class="product__item">
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
                                        <button type="submit" class="" style="background: none; color:black;"><i class="fal fa-heart"></i></button>
                                    </form>
									<!-- Button trigger modal -->
									<a href="#" data-toggle="modal" data-target="#productModalId">
									<i class="fal fa-search"></i>
									</a>
								</div> --}}
							</div>
							<div class="product__content p-relative">
								<div class="product__content-inner">
									<h4><a href="{{ route('product.details', $item->slug) }}">{{ $item->title }}</a></h4>
									<div class="product__price transition-3">
										@if ( !is_null($item->offer_price) )
                                            <span>{{ $webinfo->currency_icon }} {{ $item->offer_price }} {{ $webinfo->currency }}</span>
                                            <span class="old-price">${{ $item->price }}</span>
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
		</div>
		<div class="row">
			<div class="col-xl-12">
				<div class="product__load-btn text-center mt-25">
					<a href="{{ route('shop') }}" class="os-btn os-btn-3">Load More</a>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- product area end -->


<!-- banner area start -->
<div class="banner__area-2 pb-60">
	<div class="container-fluid p-0">
		<div class="row no-gutters">
			@foreach ($baner_l as $item)
			<div class="col-xl-6 col-lg-6">
				<div class="banner__item-2 banner-right p-relative mb-30 pr-15">
					<div class="banner__thumb fix">
						<a href="{{ $item->btn_link }}" class="w-img"><img
							src="{{ asset('Backend/Image/Baner/'.$item->image) }}" height="457" width="950"
							alt="banner"></a>
					</div>
					<div class="banner__content-2 p-absolute transition-3">
						<span>{{ $item->subtitle }}</span>
						<h4><a href="{{ $item->btn_link }}">{{ $item->title }}</a></h4>
						<p>{!! $item->desc !!}</p>
						<a href="{{ $item->btn_link }}" class="os-btn os-btn-2">{{ $item->btn_text }} /
						<span>{{ $webinfo->currency_icon }} {{ $item->price }} {{ $webinfo->currency }}</span></a>
					</div>
				</div>
			</div>
			@endforeach
			@foreach ($baner_r as $item)
			<div class="col-xl-6 col-lg-6">
				<div class="banner__item-2 banner-left p-relative mb-30 pl-15">
					<div class="banner__thumb fix">
						<a href="{{ $item->btn_link }}" class="w-img"><img
							src="{{ asset('Backend/Image/Baner/'.$item->image) }}" height="457" width="950"
							alt="banner"></a>
					</div>
					<div class="banner__content-2 p-absolute transition-3">
						<span>{{ $item->subtitle }}</span>
						<h4><a href="{{ $item->btn_link }}">{{ $item->title }}</a></h4>
						<p>{!! $item->desc !!}</p>
						<a href="{{ $item->btn_link }}" class="os-btn os-btn-2">{{ $item->btn_text }} /
						<span>{{ $webinfo->currency_icon }} {{ $item->price }} {{ $webinfo->currency }}</span></a>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>
<!-- banner area end -->
<!-- sale off area start -->
<section class="sale__area pb-100">
	<div class="container">
		<div class="row">
			<div class="col-xl-12">
                @foreach ( App\Models\Backend\headertitle::orderBy('title','asc')->where('position','sale')->get() as $info )
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
			<div class="col-xl-12">
				<div class="product__slider owl-carousel">
					@foreach ($sale as $item)
					<div class="product__item">
						<div class="product__wrapper mb-60">
							<div class="product__thumb">
								<a href="{{ route('product.details', $item->slug) }}" class="w-img">
								<img src="{{ asset('Backend/Image/Product/'. $item->primary) }}" alt="product-img"
									height="344px" width="270px">
								{{-- </a>
								<div class="product__action transition-3">
                                    <form action="{{ route('wishlist.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $item->id }}">
                                        <button type="submit" class="" style="background: none; color:black;"><i class="fal fa-heart"></i></button>
                                    </form>
									<!-- Button trigger modal -->
									<a href="#" data-toggle="modal" data-target="#productModalId">
									<i class="fal fa-search"></i>
									</a>
								</div> --}}
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
		</div>
	</div>
</section>
<!-- sale off area end -->
<!-- client slider area start -->
<section class="client__area pt-15 pb-140">
	<div class="container">
		<div class="row">
			<div class="col-xl-12">
				<div class="client__slider owl-carousel text-center">
                    @foreach ($brand as $item)
                        <div class="client__thumb">
                            <img src="{{ asset('Backend/Image/Brand/'.$item->logo) }}" alt="Brand" width="200" height="100">
                        </div>
                    @endforeach

				</div>
			</div>
		</div>
	</div>
</section>
<!-- client slider area end -->
<!-- blog area start -->
<section class="blog__area pb-70">
	<div class="container">
		<div class="row">
			<div class="col-xl-12">
                @foreach ( App\Models\Backend\headertitle::orderBy('title','asc')->where('position','blog')->get() as $info )
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
			<div class="col-xl-12">
				<div class="blog__slider owl-carousel">
					@foreach ($blog as $post)
					<div class="blog__item mb-30">
						<div class="blog__thumb fix">
							<a href="{{ route('blog.details', $post->slug) }}" class="w-img"><img
								src="{{ asset('Backend/Image/post/'.$post->image) }}" alt="blog"></a>
						</div>
						<div class="blog__content">
							<h4><a href="{{ route('blog.details', $post->slug) }}">{!! Str::limit($post->title, 50, ' ...') !!}</a></h4>
							<div class="blog__meta">
								<span>By <a href="#">{{ $post->author_name->name }}</a></span>
								<span>/ {{ $post->created_at->format('j F Y') }}</span>
							</div>
							<p>{!! Str::limit($post->desc, 150, ' ...') !!}</p>
							<a href="{{ route('blog.details', $post->slug) }}" class="os-btn">read more</a>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</section>
<!-- blog area end -->
<!-- subscribe area start -->
    @include('frontend.include.newslatter')
<!-- subscribe area end -->
<!-- shop modal start -->
<!-- Modal -->
{{-- <div class="modal fade" id="productModalId" tabindex="-1" role="dialog" aria-hidden="true">
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
											<img src="{{ asset('Frontend/assets/img/shop/product/quick-view/quick-big-1.jpg') }}"
												alt="">
										</div>
									</div>
									<div class="tab-pane fade" id="nav-profile" role="tabpanel"
										aria-labelledby="nav-profile-tab">
										<div class="product__modal-img w-img">
											<img src="{{ asset('Frontend/assets/img/shop/product/quick-view/quick-big-2.jpg') }}"
												alt="">
										</div>
									</div>
									<div class="tab-pane fade" id="nav-contact" role="tabpanel"
										aria-labelledby="nav-contact-tab">
										<div class="product__modal-img w-img">
											<img src="{{ asset('Frontend/assets/img/shop/product/quick-view/quick-big-3.jpg') }}"
												alt="">
										</div>
									</div>
								</div>
								<nav>
									<div class="nav nav-tabs justify-content-between" id="nav-tab" role="tablist">
										<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab"
											href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">
											<div class="product__nav-img w-img">
												<img src="{{ asset('Frontend/assets/img/shop/product/quick-view/quick-sm-1.jpg') }}"
													alt="">
											</div>
										</a>
										<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab"
											href="#nav-profile" role="tab" aria-controls="nav-profile"
											aria-selected="false">
											<div class="product__nav-img w-img">
												<img src="{{ asset('Frontend/assets/img/shop/product/quick-view/quick-sm-2.jpg') }}"
													alt="">
											</div>
										</a>
										<a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab"
											href="#nav-contact" role="tab" aria-controls="nav-contact"
											aria-selected="false">
											<div class="product__nav-img w-img">
												<img src="{{ asset('Frontend/assets/img/shop/product/quick-view/quick-sm-3.jpg') }}"
													alt="">
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
												<a href="#" class="os-btn os-btn-black os-btn-3 mr-10">+ Add to Cart</a>
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
</div> --}}
<!-- shop modal end -->
@endsection
