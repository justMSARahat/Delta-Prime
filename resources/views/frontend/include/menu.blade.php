<!-- header area start -->
<header>
    <div id="header-sticky" class="header__area grey-bg">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4">
                    <div class="logo">
                        @php
                            $webinfo    = App\Models\Backend\webinfo::orderBy('id','asc')->first();
                        @endphp
                        @if ( !is_null($webinfo->logo) )
                            <a href="{{ route('home') }}"><img src="{{ asset('Backend/Image/Website/' .$webinfo->logo) }}" alt="logo" width="100px"></a>
                        @else
                            <a href="{{ route('home') }}"><img src="{{ asset('Frontend/assets/img/logo/logo.png') }}" alt="logo"></a>
                        @endif
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-md-8 col-sm-8">
                    <div class="header__right p-relative d-flex justify-content-between align-items-center">
                        <div class="main-menu d-none d-lg-block">
                            <nav>
                                <ul>
                                    @foreach ( App\Models\Backend\category::orderBy('title','asc')->where('parent',0)->where('feature',1)->limit(6)->get() as $menu )
                                        @php
                                            $child = App\Models\Backend\category::orderBy('title','asc')->where('parent',$menu->id)->get();
                                            $count = $child->count();
                                        @endphp
                                        @if ( $count!=0 )
                                            <li class="active has-dropdown"><a href="{{ route('menu.search.product',$menu->id) }}">{{ $menu->title }}</a>
                                                <ul class="submenu transition-3">
                                                    @foreach ($child as $item)
                                                        <li><a href="{{ route('menu.search.product',$item->id) }}">{{ $item->title }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @else
                                            <li><a href="{{ route('menu.search.product',$menu->id) }}">{{ $menu->title }}</a></li>
                                        @endif
                                    @endforeach
                                </ul>
                            </nav>
                        </div>
                        <div class="mobile-menu-btn d-lg-none">
                            <a href="javascript:void(0);" class="mobile-menu-toggle"><i class="fas fa-bars"></i></a>
                        </div>
                        <div class="header__action">
                            <ul>
                                <li><a href="#" class="search-toggle"><i class="ion-ios-search-strong"></i> Search</a>
                                </li>
                                <li><a href="javascript:void(0);" class="cart"><i class="ion-bag"></i> Cart
                                    <span>({{ App\Models\Backend\cart::totalItems() }})</span></a>
                                    <ul class="mini-cart">
                                        @foreach( App\Models\Backend\cart::totalCarts() as $items  )
                                        <li>
                                            <div class="cart-img f-left">
                                                <a href="product-details.html">
                                                    <img src="{{ asset('Backend/Image/Product/'.$items->product->primary) }}" alt="" />
                                                </a>
                                            </div>
                                            <div class="cart-content f-left text-left">
                                                <h5>
                                                    <a href="{{ route('product.details', $items->product->slug) }}">{!! Str::limit($items->product->title, 20, '...')  !!}</a>
                                                </h5>
                                                <div class="cart-price">
                                                    <span class="ammount">{{ $items->product_quantity }} <i class="fal fa-times"></i></span>
                                                    <span class="price">$
                                                        @if ( !is_null($items->product->offer_price) )
                                                            {{ $items->product->offer_price }}
                                                        @else
                                                            {{ $items->product->price }}
                                                        @endif
                                                    </span>


                                                </div>
                                            </div>
                                            <div class="del-icon f-right mt-30">

                                                <form action="{{route('cart.delete',$items->id)}}" method="POST">
                                                    @csrf
                                                    <button style="background: none" type="submit">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </li>
                                        @endforeach
                                        <li>
                                            <div class="total-price">
                                                <span class="f-left">Subtotal:</span>
                                                <span class="f-right">${{ App\Models\Backend\cart::totalPrice() }}</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="checkout-link">
                                                <a href="{{ route('cart.manage') }}" class="os-btn">view Cart</a>
                                                <a class="os-btn os-btn-black" href="{{ route('checkout.page') }}">Checkout</a>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li> <a href="javascript:void(0);"><i class="far fa-bars"></i></a>
                                    <ul class="extra-info">
                                    @if( Auth::guard('customer')->check() )
                                        <li>
                                            <div class="my-account">
                                                <div class="extra-title">
                                                    <h5>{{ Auth::guard('customer')->user()->name}}</h5>
                                                </div>
                                                <ul>
                                                    <li><a href="{{ route('account') }}">My Account</a></li>
                                                    {{-- <li><a href="{{ route('wishlist.manage') }}">Wishlist</a></li> --}}
                                                    <li><a href="{{ route('cart.manage') }}">Cart</a></li>
                                                    <li><a href="{{ route('checkout.page') }}">Checkout</a></li>
                                                    <li>
                                                        <a  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"` style="color:black;">
                                                            {{ __('Logout') }}
                                                        </a>
                                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                            @csrf
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    @else
                                        @guest
                                            @if (Route::has('login'))
                                                <li class="nav-item"> <a href="{{ route('login.form') }}">Login</a> </li>
                                            @endif
                                            @if (Route::has('register'))
                                                <li><a href="{{ route('reg.form') }}">Register</a></li>
                                            @endif
                                        @endguest
                                    @endif
                                    @if ( Auth::check() )
                                        <li>
                                            <a  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"` style="color:black;">
                                                {{ __('Admin Logout') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                    @endif
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header area end -->

<!-- scroll up area start -->
<div class="scroll-up" id="scroll" style="display: none;">
    <a href="javascript:void(0);"><i class="fas fa-level-up-alt"></i></a>
</div>
<!-- scroll up area end -->


<!-- search area start -->
<section class="header__search white-bg transition-3">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="header__search-inner text-center">
                        <div class="header__search-btn">
                            <a href="javascript:void(0);" class="header__search-btn-close"><i
                                    class="fal fa-times"></i></a>
                        </div>
                        <div class="header__search-header">
                            <h3>Search</h3>
                        </div>
                        <div class="header__search-categories">
                            <ul class="search-category">
                                @foreach ( App\Models\Backend\category::orderBy('title','asc')->where('status',1)->where('parent',0)->limit(10)->get() as $cat )
                                    <form action="{{ route('category.search.product') }}" method="get" style="display: inline">
                                        <li>
                                            <input type="hidden" name="category" value="{{ $cat->id }}">
                                            <a href=""><button type="submit" style="background: none; display: inline-block;">{{ $cat->title }}</button></a>
                                        <li>
                                    </form>
                                @endforeach
                            </ul>
                        </div>
                        <form action="{{ route('search.product') }}" method="get">
                            @csrf
                            <div class="header__search-input p-relative">
                                <input type="text" placeholder="Search for products... " name="search">
                                <button type="submit"><i class="far fa-search"></i></button>
                            </div>
                        </form>


                </div>
            </div>
        </div>
    </div>
</section>


<div class="body-overlay transition-3"></div>
<!-- search area end -->

<!-- extra info area start -->
    <section class="extra__info transition-3">
        <div class="extra__info-inner">
            <div class="extra__info-close text-right">
                <a href="javascript:void(0);" class="extra__info-close-btn"><i class="fal fa-times"></i></a>
            </div>
            <!-- side-mobile-menu start -->
            <nav class="side-mobile-menu d-block d-lg-none">
                <ul>
                    @foreach ( App\Models\Backend\category::orderBy('title','asc')->where('parent',0)->where('feature',1)->get() as $menu )
                        <li><a href="{{ $menu->link }}">{{ $menu->title }}</a></li>
                    @endforeach
                </ul>
            </nav>

            {{-- <nav class="side-mobile-menu d-block d-lg-none">
                <ul>
                    @foreach ( App\Models\Backend\category::orderBy('title','asc')->where('parent',0)->where('feature',1)->get() as $menu )

                        @php
                            $child = App\Models\Backend\category::orderBy('title','asc')->where('parent',$menu->id)->get();
                            $count = $child->count();
                        @endphp
                        @if ( $count!=0 )
                            <li class="active has-dropdown"><a href="index.html">{{ $menu->title }}</a>
                                <ul class="submenu transition-3">
                                    @foreach ($child as $child)
                                        <li><a href="">{{ $child->title }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        @else
                            <li><a href="">{{ $menu->title }}</a></li>
                        @endif
                    @endforeach
                </ul>
            </nav> --}}
            <!-- side-mobile-menu end -->
        </div>
    </section>
<div class="body-overlay transition-3"></div>
<!-- extra info area end -->
