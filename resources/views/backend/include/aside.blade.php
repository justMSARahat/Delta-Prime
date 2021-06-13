<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">

        @php
            $webinfo    = App\Models\Backend\webinfo::orderBy('id','asc')->first();
        @endphp

        @if ( !is_null($webinfo->logo) )
            <img src="{{ asset('Backend/Image/Website/' .$webinfo->logo) }}" alt="AdminLTE Logo"
                class="brand-image img-circle elevation-3" style="opacity: .8; border-radius:0">
        @else
            <img src="{{ asset('Backend/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                class="brand-image img-circle elevation-3" style="opacity: .8">
        @endif
        <span class="brand-text font-weight-light">{{ $webinfo->title }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link @if( Route::currentRouteNamed('dashboard') ) active @endif">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>


                <li class="nav-header">Website Function</li>


                <li class="nav-item">
                    <a href="{{ route('brand.manage') }}" class="nav-link @if( Route::currentRouteNamed('brand.manage') || Route::currentRouteNamed('brand.create') || Route::currentRouteNamed('brand.edit') ) active @endif">
                        <i class="nav-icon fas fa-bookmark"></i>
                        <p>
                            Brands
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('brand.manage') }}" class="nav-link @if( Route::currentRouteNamed('brand.manage') ) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manage Brands</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('brand.create') }}" class="nav-link @if( Route::currentRouteNamed('brand.create') ) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Brand</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ route('cat.manage') }}" class="nav-link @if( Route::currentRouteNamed('cat.manage') ||  Route::currentRouteNamed('cat.create')  ||  Route::currentRouteNamed('cat.edit')  ) active @endif">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Category
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('cat.manage') }}" class="nav-link @if( Route::currentRouteNamed('cat.manage') ) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manage Categorys</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('cat.create') }}" class="nav-link @if( Route::currentRouteNamed('cat.create') ) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Category</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ route('post.manage') }}" class="nav-link @if( Route::currentRouteNamed('post.manage') ||  Route::currentRouteNamed('post.create') ||  Route::currentRouteNamed('post.edit')  ) active @endif">
                        <i class="nav-icon fas fa-vote-yea"></i>
                        <p>
                            Posts
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('post.manage') }}" class="nav-link @if( Route::currentRouteNamed('post.manage') ) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manage Posts</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('post.create') }}" class="nav-link @if( Route::currentRouteNamed('post.create') ) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Post</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('comment.manage') }}" class="nav-link @if( Route::currentRouteNamed('comment.manage') ) active @endif">
                        <i class="nav-icon fas fa-comments"></i>
                        <p>
                            Comments
                        </p>
                    </a>
                </li>


                <li class="nav-header">Ecommerce Function</li>

                <li class="nav-item">
                    <a href="{{ route('product.manage') }}" class="nav-link @if( Route::currentRouteNamed('product.manage') ||  Route::currentRouteNamed('product.create') ||  Route::currentRouteNamed('product.show') ||  Route::currentRouteNamed('product.edit') ||  Route::currentRouteNamed('color.manage') ||  Route::currentRouteNamed('color.create') ||  Route::currentRouteNamed('color.edit')  ) active @endif">
                        <i class="nav-icon fas fa-atom"></i>
                        <p>
                            Product
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('product.manage') }}" class="nav-link @if( Route::currentRouteNamed('product.manage') ) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manage Products</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('product.create') }}" class="nav-link @if( Route::currentRouteNamed('product.create') ) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Product</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('color.manage') }}" class="nav-link @if( Route::currentRouteNamed('color.manage') ) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manage Color</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.order.pending') }}" class="nav-link @if( Route::currentRouteNamed('admin.order.pending') ||  Route::currentRouteNamed('admin.order.complete') ||  Route::currentRouteNamed('admin.order.cancel') ) active @endif">
                        <i class="nav-icon fas fa-cart-plus"></i>
                        <p>
                            Orders
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.order.pending') }}" class="nav-link @if( Route::currentRouteNamed('admin.order.pending') ) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pending Orders</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.order.complete') }}" class="nav-link @if( Route::currentRouteNamed('admin.order.complete') ) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Completed Order</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.order.cancel') }}" class="nav-link @if( Route::currentRouteNamed('admin.order.cancel') ) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Canceled Order</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ route('review.manage') }}" class="nav-link @if( Route::currentRouteNamed('review.manage') ) active @endif">
                        <i class="nav-icon fas fa-smile-beam"></i>
                        <p>
                            Reviews
                        </p>
                    </a>
                </li>

                <li class="nav-header">Delivery Area</li>
                <li class="nav-item">
                    <a href="{{ route('country.manage') }}" class="nav-link @if( Route::currentRouteNamed('country.manage') ||  Route::currentRouteNamed('country.create') ||  Route::currentRouteNamed('country.edit')  ) active @endif">
                        <i class="nav-icon fas fa-map-marker-alt"></i>
                        <p>
                            Country
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('country.manage') }}" class="nav-link @if( Route::currentRouteNamed('country.manage') ) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manage Country</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('country.create') }}" class="nav-link @if( Route::currentRouteNamed('country.create') ) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Country</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('state.manage') }}" class="nav-link @if( Route::currentRouteNamed('state.manage') ||  Route::currentRouteNamed('state.create') ||  Route::currentRouteNamed('state.edit')  ) active @endif">
                        <i class="nav-icon fas fa-map"></i>
                        <p>
                            State / Region
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('state.manage') }}" class="nav-link @if( Route::currentRouteNamed('state.manage') ) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manage State</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('state.create') }}" class="nav-link @if( Route::currentRouteNamed('state.create') ) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add State</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('city.manage') }}" class="nav-link @if( Route::currentRouteNamed('city.manage') ||  Route::currentRouteNamed('city.create') ||  Route::currentRouteNamed('city.edit')  ) active @endif">
                        <i class="nav-icon fas fa-directions"></i>
                        <p>
                            City
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('city.manage') }}" class="nav-link @if( Route::currentRouteNamed('city.manage') ) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manage City</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('city.create') }}" class="nav-link @if( Route::currentRouteNamed('city.create') ) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add City</p>
                            </a>
                        </li>
                    </ul>
                </li>



                <li class="nav-header">Website Decoration</li>
                <li class="nav-item">
                    <a href="{{ route('slider.manage') }}" class="nav-link @if( Route::currentRouteNamed('slider.manage') ||  Route::currentRouteNamed('slider.create') ||  Route::currentRouteNamed('slider.show') ||  Route::currentRouteNamed('slider.edit')  ) active @endif">
                        <i class="nav-icon fas fa-film"></i>
                        <p>
                            Slider
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('slider.manage') }}" class="nav-link @if( Route::currentRouteNamed('slider.manage') ) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manage Slider</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('slider.create') }}" class="nav-link @if( Route::currentRouteNamed('slider.create') ) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Slider</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('baner.manage') }}" class="nav-link @if( Route::currentRouteNamed('baner.manage') ||  Route::currentRouteNamed('baner.create') ||  Route::currentRouteNamed('baner.show') ||  Route::currentRouteNamed('baner.edit')  ) active @endif">
                        <i class="nav-icon fas fa-expand"></i>
                        <p>
                            Baner
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('baner.manage') }}" class="nav-link @if( Route::currentRouteNamed('baner.manage') ) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manage Baner</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('baner.create') }}" class="nav-link @if( Route::currentRouteNamed('baner.create') ) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Baner</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('feature.manage') }}" class="nav-link @if( Route::currentRouteNamed('feature.manage') ||  Route::currentRouteNamed('feature.create') ||  Route::currentRouteNamed('feature.show') ||  Route::currentRouteNamed('feature.edit')  ) active @endif">
                        <i class="nav-icon fas fa-sliders-h"></i>
                        <p>
                            Featured Product
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('feature.manage') }}" class="nav-link @if( Route::currentRouteNamed('feature.manage') ) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manage Featured</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('feature.create') }}" class="nav-link @if( Route::currentRouteNamed('feature.create') ) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Featured</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-header">CMS</li>
                <li class="nav-item">
                    <a href="{{ route('header.manage') }}" class="nav-link @if( Route::currentRouteNamed('header.manage') ||  Route::currentRouteNamed('header.create') || Route::currentRouteNamed('header.edit')  ) active @endif">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Page Header
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('heading.manage') }}" class="nav-link @if( Route::currentRouteNamed('heading.manage') ||  Route::currentRouteNamed('heading.create') || Route::currentRouteNamed('heading.edit')  ) active @endif">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Component Heading
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('contact.manage') }}" class="nav-link @if( Route::currentRouteNamed('contact.manage') ||  Route::currentRouteNamed('contact.create') || Route::currentRouteNamed('contact.edit')  ) active @endif">
                        <i class="nav-icon fas fa-user-cog"></i>
                        <p>Contact</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('footer.manage') }}" class="nav-link @if( Route::currentRouteNamed('footer.manage') || Route::currentRouteNamed('footer.edit')  ) active @endif">
                        <i class="nav-icon fas fa-toolbox"></i>
                        Footer
                    </a>
                </li>

                <li class="nav-header">User Management</li>
                <li class="nav-item">
                    <a href="{{ route('admin.manage') }}" class="nav-link @if( Route::currentRouteNamed('admin.manage') ||  Route::currentRouteNamed('admin.create') ||  Route::currentRouteNamed('admin.show') ||  Route::currentRouteNamed('admin.edit')  ) active @endif">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Employee
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.manage') }}" class="nav-link @if( Route::currentRouteNamed('admin.manage') ) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manage Employee</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.create') }}" class="nav-link @if( Route::currentRouteNamed('admin.create') ) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Employee</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user.manage') }}" class="nav-link @if( Route::currentRouteNamed('user.manage') ||  Route::currentRouteNamed('user.create') ||  Route::currentRouteNamed('user.show') ||  Route::currentRouteNamed('user.edit')  ) active @endif">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>
                            Users
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('user.manage') }}" class="nav-link @if( Route::currentRouteNamed('user.manage') ) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manage Users</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user.create') }}" class="nav-link @if( Route::currentRouteNamed('user.create') ) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Users</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-header">Website Settings</li>

                <li class="nav-item">
                    <a href="" class="nav-link @if( Route::currentRouteNamed('info.show') || Route::currentRouteNamed('edit')  || Route::currentRouteNamed('payment.settings') ||  Route::currentRouteNamed('optimize.show')  ) active @endif">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>
                            Setitngs
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('info.show') }}" class="nav-link @if( Route::currentRouteNamed('info.show') ) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Information</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('payment.settings') }}" class="nav-link @if( Route::currentRouteNamed('payment.settings') ) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Payment Methods</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('optimize.show') }}" class="nav-link @if( Route::currentRouteNamed('optimize.show') ) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Optimize</p>
                            </a>
                        </li>

                    </ul>
                </li>


                <li class="nav-header">End Session</li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>{{ __('Logout') }}</p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
