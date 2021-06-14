@extends('frontend.layout.template_2')
@section('meta')
    @foreach ( App\Models\Backend\pageheader::orderBy('title','asc')->where('page','Login')->get() as $header )
        <title>{{ $header->tab }}</title>
        <meta name="title" content="{{ $header->meta_title }}">
        <meta name="description" content="{{ $header->description }}">
        <meta name="tag" content="{{ $header->tag }}">
    @endforeach
@endsection
@section('body')

    <!-- page title area start -->
    @foreach ( App\Models\Backend\pageheader::orderBy('title','asc')->where('page','Login')->get() as $header )
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

        <!-- login Area Strat-->
        <section class="login-area pt-100 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="basic-login">
                            <h3 class="text-center mb-60">Login From Here</h3>
                            <form method="POST" action="{{ route('login.pro') }}" >
                                @csrf
                                <label for="name">{{ __('E-Mail Address') }}<span>**</span></label>
                                <input id="name" type="email" placeholder="Email address..." name="email" class="@error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus/>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                <label for="pass">{{ __('Password') }} <span>**</span></label>
                                <input id="pass" type="password" name="password" placeholder="Enter password..." class="@error('password') is-invalid @enderror" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <div class="login-action mb-20 fix">
                                    <span class="log-rem f-left">
                                        <input id="remember" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} />
                                        <label for="remember">Remember me!</label>
                                    </span>
                                    <span class="forgot-login f-right">
                                        <a href="{{ route('admin.password.request') }}">Lost your password?</a>
                                    </span>
                                </div>
                                <button class="os-btn w-100">Login Now</button>
                                <div class="or-divide"><span>or</span></div>
                                <a href="{{ route('reg.form') }}" class="os-btn os-btn-black w-100">Register Now</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- login Area End-->
@endsection
