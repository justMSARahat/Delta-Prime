@extends('frontend.layout.template_2')
@section('meta')
    @foreach ( App\Models\Backend\pageheader::orderBy('title','asc')->where('page','Register')->get() as $header )
        <title>{{ $header->tab }}</title>
        <meta name="title" content="{{ $header->meta_title }}">
        <meta name="description" content="{{ $header->description }}">
        <meta name="tag" content="{{ $header->tag }}">
    @endforeach
@endsection
@section('body')


    <!-- page title area start -->
    @foreach ( App\Models\Backend\pageheader::orderBy('title','asc')->where('page','Register')->get() as $header )
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
                <div class="col-lg-8 offset-lg-2">
                    <div class="basic-login">
                        <h3 class="text-center mb-60">Signup From Here</h3>
                        <form method="POST" action="{{ route('reg.pro') }}">
                            @csrf

                            <label for="name">{{ __('Name') }} <span>**</span></label>
                            <input id="name" type="text" placeholder="Enter Username" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus />
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <label for="email-id">{{ __('Email') }} <span>**</span></label>
                            <input id="email" type="email" placeholder="Email address..." class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror


                            <label for="pass">{{ __('Password') }} <span>**</span></label>
                            <input id="password" type="password" placeholder="Enter password..." class=" @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror


                            <label for="pass">{{ __('Confirm Password') }} <span>**</span></label>
                                <input id="password" type="password" placeholder="Retype password..." class="" name="password_confirmation" required autocomplete="new-password">


                            <div class="mt-10"></div>
                            <button class="os-btn w-100">Register Now</button>
                            <div class="or-divide"><span>or</span></div>
                            <a href="{{ route('login.form') }}l" class="os-btn os-btn-black w-100">login Now</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- login Area End-->

@endsection
