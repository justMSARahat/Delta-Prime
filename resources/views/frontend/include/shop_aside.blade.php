<div class="shop__sidebar">
    <div class="sidebar__widget mb-55">
        <div class="sidebar__widget-title mb-25">
            <h3>Product Categories</h3>
        </div>
        <div class="sidebar__widget-content">
            <div class="categories">
                <div id="accordion">

                    @foreach ( App\Models\Backend\category::orderBy('title','asc')->where('status',1)->where('parent',0)->get() as $parent )
                    <div class="card">

                        @php
                        $child =  App\Models\Backend\category::orderBy('title','asc')->where('parent',$parent->id)->get();
                        $count = $child->count();
                        @endphp
                        @if ($count!=0)
                            <style>
                            .sidebar__widget-content .categories .child::after {
                                    position: absolute;
                                    content: "";
                                    right: 0;
                                    top: 50%;
                                    -webkit-transform: translateY(-50%) rotate(90deg);
                                    -moz-transform: translateY(-50%) rotate(90deg);
                                    -ms-transform: translateY(-50%) rotate(90deg);
                                    transform: translateY(-50%) rotate(90deg);
                                    font-size: 18px;
                                    font-family: "Font Awesome 5 Pro";
                                }
                            </style>
                            <div class="card-header white-bg child" id="accessories">
                                <h5 class="mb-0">
                                    <button class="shop-accordion-btn child" data-toggle="collapse" style="color: black"
                                        data-target="#{{ $parent->slug }}" aria-expanded="true"
                                        aria-controls="{{ $parent->slug }}">
                                        {{ $parent->title }}
                                    </button>
                                </h5>
                            </div>
                            <div id="{{ $parent->slug }}" class="collapse hide" aria-labelledby="accessories"
                                data-parent="#accordion">
                                <div class="card-body">
                                    <div class="categories__list">
                                        <ul>
                                            @foreach (
                                            App\Models\Backend\category::orderBy('title','asc')->where('status',1)->where('parent',$parent->id)->get()
                                            as $child )
                                            <form action="{{ route('category.search.product') }}" method="get">
                                                <li>
                                                    <input type="hidden" name="category" value="{{ $child->slug }}">
                                                    <button type="submit"
                                                        style="background: none">{{ $child->title }}</button>
                                                <li>
                                            </form>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @else
                            <style>
                               .sidebar__widget-content .categories .parent::after {
                                    position: absolute;
                                    right: 0;
                                    top: 50%;
                                    -webkit-transform: translateY(-50%) rotate(90deg);
                                    -moz-transform: translateY(-50%) rotate(90deg);
                                    -ms-transform: translateY(-50%) rotate(90deg);
                                    transform: translateY(-50%) rotate(90deg);
                                    font-size: 18px;
                                    font-family: "Font Awesome 5 Pro";
                                    display: none;
                                }
                            </style>
                            <div class="card-header white-bg " id="accessories">
                                <h5 class="mb-0">
                                    <form action="{{ route('category.search.product') }}" method="get">
                                        <li>
                                            <input type="hidden" name="category" value="{{ $parent->slug }}">
                                            <button type="submit" class="shop-accordion-btn parent"
                                                style="background: none; color:black">{{ $parent->title }}</button>
                                        <li>
                                    </form>
                                </h5>
                            </div>
                        @endif
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    <div class="sidebar__widget mb-55">
        <div class="sidebar__widget-title mb-30">
            <h3 class="">Filter By Price</h3>
        </div>
        <div class="sidebar__widget-content">
            <div class="price__slider">
                <div id="slider-range" class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content" style="color: red">
                    <div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 24.2%;"></div>
                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 24.2%;"></span>
                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"  style="left: 70.2%;"></span>
                </div>
                <div>
                    <form action="{{ route('shop_filter') }}" method="GET">
                        <button type="submit">Filter</button>
                        <label for="amount">Price :</label>
                        <input type="text" id="amount" readonly="">
                        <input type="hidden" id="minamount" name="minamount" readonly="">
                        <input type="hidden" id="maxamount" name="maxamount" readonly="">
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="sidebar__widget mb-55">
        <div class="sidebar__widget-title mb-30">
            <h3>Any Size</h3>
        </div>
        <div class="sidebar__widget-content">
            <div class="size">
                <ul>
                    <form action="{{ route('shop_filter') }}" method="GET">
                        <li><button type="submit" style="border-radius: 50%" value="1" name="S"><a href="#">S</a></button></li>
                        <li><button type="submit" style="border-radius: 50%" value="2" name="M"><a href="#">M</a></button></li>
                        <li><button type="submit" style="border-radius: 50%" value="3" name="L"><a href="#">L</a></button></li>
                        <li><button type="submit" style="border-radius: 50%" value="4" name="XL"><a href="#">Xl</a></button></li>
                        <li><button type="submit" style="border-radius: 50%" value="5" name="XXL"><a href="#">XXL</a></button></li>
                    </form>
                </ul>
            </div>
        </div>
    </div>
    <div class="sidebar__widget mb-60">
        <div class="sidebar__widget-title mb-20">
            <h3>Choose Color</h3>
        </div>
        <div class="sidebar__widget-content">
            <div class="color__pick">
                <form action="#">
                    <ul>
                        <li><button type="submit" class="color color-1"></button></li>
                        <li><button type="submit" class="color color-2"></button></li>
                        <li><button type="submit" class="color color-3"></button></li>
                        <li><button type="submit" class="color color-4"></button></li>
                        <li><button type="submit" class="color color-5"></button></li>
                        <li><button type="submit" class="color color-6"></button></li>
                        <li><button type="submit" class="color color-7"></button></li>
                    </ul>
                </form>
            </div>
        </div>
    </div> --}}
    <div class="sidebar__widget mb-50">
        <div class="sidebar__widget-title mb-25">
            <h3>Brand</h3>
        </div>
        <div class="sidebar__widget-content">
            <div class="brand">
                <ul>
                    @foreach ( App\Models\Backend\brand::orderBy('title','asc')->where('status',1)->limit(10)->get() as $item )

                        <form action="{{ route('brand.search.product') }}" method="get">
                            <li>
                                <input type="hidden" name="brand" value="{{ $item->id }}">
                                <button type="submit" class="shop-accordion-btn parent"
                                    style="background: none;" >{{ $item->title }}</button>
                            <li>
                        </form>

                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="sidebar__widget">
        <div class="sidebar__widget-title mb-30">
            <h3>Featured Products</h3>
        </div>
        <div class="sidebar__widget-content">
            <div class="features__product">
                <ul>
                    @foreach ( App\Models\Backend\product::orderBy('id','desc')->where('status',1)->limit(3)->get() as
                    $item )
                    <li class="mb-20">
                        <div class="featires__product-wrapper d-flex">
                            <div class="features__product-thumb mr-15">
                                <a href="{{ route('product.details', $item->slug) }}"><img
                                        src="{{ asset('Backend/Image/Product/'.$item->primary) }}" alt="pro-sm-1"
                                        width="86px" height="110"></a>
                            </div>
                            <div class="features__product-content">
                                <h5><a href="{{ route('product.details', $item->slug) }}">{!! Str::limit( $item->title,
                                        25, '...') !!}</a></h5>
                                <div class="price">
                                    @php
                                        $webinfo    = App\Models\Backend\webinfo::orderBy('id','asc')->first();
                                    @endphp
                                    @if ( !is_null($item->offer_price) )
                                        <span>{{ $webinfo->currency_icon }} {{ $item->offer_price }} {{ $webinfo->currency }}</span>
                                        <span class="old-price">{{ $webinfo->currency_icon }}  {{ $item->price }}  {{ $webinfo->currency }}</span>
                                    @else
                                        <span>{{ $webinfo->currency_icon }} {{ $item->price }} {{ $webinfo->currency }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
