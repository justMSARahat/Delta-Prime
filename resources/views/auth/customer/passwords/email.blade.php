@extends('frontend.layout.template_2')
@section('meta')
        <title>Reset Password</title>
        <meta name="title" content="Reset Password">
        <meta name="description" content="Reset Password">
        <meta name="tag" content="Reset Password">
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
                            <h3 class="text-center mb-60">Reset Password</h3>


                            @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                            @endif

                            <form method="POST" action="{{ route('admin.password.email') }}">
                                @csrf

                                <div class="form-group">


                                    <div class="col-md-12">
                                        <label for="name">{{ __('E-Mail Address') }}<span>**</span></label>
                                        <input id="email" type="email" placeholder="Email address..." name="email" class="@error('email') is-invalid @enderror"  required autocomplete="email" autofocus/>
                                        {{-- <input id="email" type="email"  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus> --}}

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <button type="submit" class="os-btn w-100">Send Reset Link</button>
                                    </div>
                                </div>

                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- login Area End-->
@endsection
