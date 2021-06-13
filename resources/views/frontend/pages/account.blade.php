@extends('frontend.layout.template_2')
@section('meta')
    @foreach ( App\Models\Backend\pageheader::orderBy('title','asc')->where('page','Account')->get() as $header )
        <title>{{ $header->tab }}</title>
        <meta name="title" content="{{ $header->meta_title }}">
        <meta name="description" content="{{ $header->description }}">
        <meta name="tag" content="{{ $header->tag }}">
    @endforeach
@endsection
@section('body')

<style>
    .main-body {
        padding: 15px;
    }

    .nav-link {
        color: #4a5568;
    }

    .card {
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
    }

    .nav-pills .nav-link.active,
    .nav-pills .show>.nav-link {
        color: #fff;
        background-color: #BC8246;
    }

    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 0 solid rgba(0, 0, 0, .125);
        border-radius: .25rem;
    }

    .card-body {
        flex: 1 1 auto;
        min-height: 1px;
        padding: 1rem;
    }

    .gutters-sm {
        margin-right: -8px;
        margin-left: -8px;
    }

    .gutters-sm>.col,
    .gutters-sm>[class*=col-] {
        padding-right: 8px;
        padding-left: 8px;
    }

    .mb-3,
    .my-3 {
        margin-bottom: 1rem !important;
    }

    .bg-gray-300 {
        background-color: #e2e8f0;
    }

    .h-100 {
        height: 100% !important;
    }

    .shadow-none {
        box-shadow: none !important;
    }
</style>


    <!-- page title area start -->
    @foreach ( App\Models\Backend\pageheader::orderBy('title','asc')->where('page','Account')->get() as $header )
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
<!-- login Area Strat-->
<section class="login-area pt-100 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="">
                    <div class="row gutters-sm">
                        <div class="col-md-4 d-none d-md-block">
                            <div class="card">
                                <div class="card-body">
                                    <nav class="nav flex-column nav-pills nav-gap-y-1">
                                        <a href="#profile" data-toggle="tab"
                                            class="nav-item nav-link has-icon nav-link-faded active">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-user mr-2">
                                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                <circle cx="12" cy="7" r="4"></circle>
                                            </svg>
                                            Profile Information
                                        </a>
                                        <a href="#account" data-toggle="tab"
                                            class="nav-item nav-link has-icon nav-link-faded">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-credit-card mr-2">
                                                <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                                <line x1="1" y1="10" x2="23" y2="10"></line>
                                            </svg>
                                            Address
                                        </a>
                                        <a href="#security" data-toggle="tab"
                                            class="nav-item nav-link has-icon nav-link-faded">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-shield mr-2">
                                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                                            </svg>
                                            Password
                                        </a>
                                        <a href="#notification" data-toggle="tab"
                                            class="nav-item nav-link has-icon nav-link-faded">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-bell mr-2">
                                                <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                                                <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                                            </svg>
                                            My Order
                                        </a>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-item nav-link has-icon nav-link-faded">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-credit-card mr-2">
                                                <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                                <line x1="1" y1="10" x2="23" y2="10"></line>
                                            </svg>
                                            Logout
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </a>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header border-bottom mb-3 d-flex d-md-none">
                                    <ul class="nav nav-tabs card-header-tabs nav-gap-x-1" role="tablist">
                                        <li class="nav-item">
                                            <a href="#profile" data-toggle="tab" class="nav-link has-icon active">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-user">
                                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                    <circle cx="12" cy="7" r="4"></circle>
                                                </svg>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#account" data-toggle="tab" class="nav-link has-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-credit-card">
                                                    <rect x="1" y="4" width="22" height="16" rx="2" ry="2">
                                                    </rect>
                                                    <line x1="1" y1="10" x2="23" y2="10"></line>
                                                </svg>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#security" data-toggle="tab" class="nav-link has-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-shield">
                                                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z">
                                                    </path>
                                                </svg>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#notification" data-toggle="tab" class="nav-link has-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-bell">
                                                    <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9">
                                                    </path>
                                                    <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                                                </svg>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body tab-content">
                                    <div class="tab-pane active" id="profile">
                                        <h6>PROFILE INFORMATION</h6>
                                        <hr>
                                        <form action="{{route('account.profile', Auth::guard('customer')->user()->id )}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="Profile">Profile</label>
                                                @if ( !is_null( Auth::guard('customer')->user()->image ) )
                                                <img src="{{ asset('Backend/Image/User/' .Auth::guard('customer')->user()->image ) }}" alt=""
                                                    style="border-radius: 50%; display: block; height:150px; width:150px">
                                                @else
                                                    <img src="{{ asset('Frontend/assets\img\testimonial/person-1.jpg') }}" alt=""
                                                        height="150px; width:150px;"
                                                        style="border-radius: 50%; display: block;">
                                                @endif
                                                <input type="file" class="form-control-files" name="image"
                                                    style="margin-top: 15px;">
                                            </div>
                                            <div class="form-group">
                                                <label for="fullName">First Name</label>
                                                <input type="text" class="form-control" id="fullName"
                                                    aria-describedby="fullNameHelp" placeholder="Enter your fullname"
                                                    value="{{ Auth::guard('customer')->user()->name }}" name="name" autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label for="fullName">Last Name</label>
                                                <input type="text" class="form-control" id="fullName"
                                                    aria-describedby="fullNameHelp" placeholder="Enter your Last Name" name="last_name" autocomplete="off"
                                                    value="{{ Auth::guard('customer')->user()->last_name }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="fullName">Email Address</label>
                                                <input type="text" class="form-control" id="fullName"
                                                    aria-describedby="fullNameHelp" placeholder="Enter your Email Address" name="email" autocomplete="off"
                                                    value="{{ Auth::guard('customer')->user()->email }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="fullName">Phone Number</label>
                                                <input type="text" class="form-control" id="fullName"
                                                    aria-describedby="fullNameHelp" placeholder="Enter your Phone Number" name="phone" autocomplete="off"
                                                    value="{{ Auth::guard('customer')->user()->phone }}">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Update
                                                Profile</button>
                                        </form>
                                    </div>
                                    <div class="tab-pane" id="account">
                                        <h6>MY ADDRESS</h6>
                                        <hr>
                                        <form action="{{route('account.address', Auth::guard('customer')->user()->id )}}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="fullName">Address 1</label>
                                                <input type="text" class="form-control" id="fullName"
                                                    aria-describedby="fullNameHelp" placeholder="Enter your Address" name="address_one"
                                                    value="{{ Auth::guard('customer')->user()->address_one }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="fullName">Address 2</label>
                                                <input type="text" class="form-control" id="fullName"
                                                    aria-describedby="fullNameHelp" placeholder="Enter your Second Address" name="address_two"
                                                    value="{{ Auth::guard('customer')->user()->address_two }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="fullName">City</label>
                                                <select name="city" class="form-control" id="">
                                                    <option disabled selected> Your City </option>
                                                    @foreach ( App\Models\Backend\city::orderBy('name','asc')->where('status',1)->get() as $item )
                                                        <option @if ( $item->id == Auth::guard('customer')->user()->city ) selected @endif value="{{ $item->id }}"> {{ $item->name }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="fullName">Post Code</label>
                                                <input type="text" class="form-control" id="fullName" name="post_code"
                                                    aria-describedby="fullNameHelp" placeholder="Enter Post Code"
                                                    value="{{ Auth::guard('customer')->user()->post_code }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="fullName">Country</label>
                                                <select name="country" class="form-control" id="">
                                                    <option disabled selected> Your Country </option>
                                                    @foreach ( App\Models\Backend\country::orderBy('priority','asc')->where('status',1)->get() as $item )
                                                        <option @if ( $item->id == Auth::guard('customer')->user()->country ) selected @endif value="{{ $item->id }}"> {{ $item->name }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="fullName">State / Region</label>
                                                <select name="state" class="form-control" id="">
                                                    <option disabled selected> Your State </option>
                                                    @foreach ( App\Models\Backend\state::orderBy('country','asc')->where('status',1)->get() as $item )
                                                        <option @if ( $item->id == Auth::guard('customer')->user()->state ) selected @endif value="{{ $item->id }}"> {{ $item->name }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <hr>
                                            <button type="submit" class="btn btn-primary">Update Address</button>
                                        </form>
                                    </div>
                                    <div class="tab-pane" id="security">
                                        <h6>PASSWORD SETTINGS</h6>
                                        <hr>
                                        <form method="POST" action="{{ route('account.password', Auth::guard('customer')->user()->id )}}">
                                            @csrf
                                            <div class="form-group">
                                                <label class="d-block">Change Password</label>
                                                <input type="text" class="form-control" placeholder="Enter your old password" name="oldpassword">
                                                <input type="text" class="form-control mt-1" placeholder="New password" name="newpassword">
                                                <input type="text" class="form-control mt-1"  placeholder="Confirm new password" name="confirmpassword">
                                            </div>
                                            <hr>
                                            <button type="submit" class="btn btn-primary">Update Password</button>
                                        </form>

                                    </div>
                                    <div class="tab-pane" id="notification">
                                        <h6>MY ORDER</h6>
                                        <hr>

                                        <form action="#">
                                            <div class="table-content table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th class="product-thumbnail">SL</th>
                                                            <th class="product-quantity">Invoice</th>
                                                            <th class="cart-product-name">Title</th>
                                                            <th class="product-price">Status</th>
                                                            <th class="product-subtotal">Cancel</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php $i=1; @endphp
                                                        @foreach ( $order as $item )
                                                                <tr>
                                                                    <td colspan="3"> {{ $item->invoice }} </td>
                                                                    <td >
                                                                        @if ($item->status==1 )
                                                                            Prossesing
                                                                        @elseif ($item->status==2 )
                                                                            Shipped
                                                                        @elseif ($item->status==3 )
                                                                            Delivered
                                                                        @elseif ($item->status==4 )
                                                                            Canceled
                                                                        @endif
                                                                    </td>
                                                                    <td >
                                                                        @if ($item->status==4 )
                                                                            <span class="btn btn-danger">Order Canceled</span>
                                                                        @else
                                                                            <a href="" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{ $item->id }}" >Cancel</a>
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                            @foreach ( App\Models\Backend\order_item::where('invoice', $item->invoice)->get() as $order )
                                                                <tr>
                                                                    <td>{{ $i++ }}</td>
                                                                    <td># {{ $order->invoice }}</td>
                                                                    <td colspan="2">{{ $order->product_name->title }}</td>
                                                                    <td colspan="2">{{ $order->product_quantity }} Pices</td>
                                                                </tr>
                                                            @endforeach
                                                                <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1" role="dialog"
                                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                                                                <button type="button" class="close" data-dismiss="modal"
                                                                                    aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body" style="text-align: left">
                                                                                Are You sure Want to Cancel The Order!
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <a href="{{ route('order.delete',$item->id) }}" class="btn btn-danger">Cancel</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                        @endforeach
                                                    </tbody>
                                                </table>
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
</section>
<!-- login Area End-->

@endsection
