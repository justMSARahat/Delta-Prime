@extends('frontend.layout.template_2')
@section('meta')
    @foreach ( App\Models\Backend\pageheader::orderBy('title','asc')->where('page','contact')->get() as $header )
        <title>{{ $header->tab }}</title>
        <meta name="title" content="{{ $header->meta_title }}">
        <meta name="description" content="{{ $header->description }}">
        <meta name="tag" content="{{ $header->tag }}">
    @endforeach
@endsection
@section('body')

    <!-- page title area start -->
    @foreach ( App\Models\Backend\pageheader::orderBy('title','asc')->where('page','contact')->get() as $header )
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

    <!-- contact area start -->
    <section class="contact__area pb-100 pt-95">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="contact__info">
                        <h3>Find us here.</h3>
                        <ul class="mb-55">
                            <li class="d-flex mb-35">
                                <div class="contact__info-icon mr-20">
                                    <i class="fal fa-map-marker-alt"></i>
                                </div>
                                <div class="contact__info-content">
                                    <h6>Address:</h6>
                                    <span>{{ $contact->address }}</span>
                                </div>
                            </li>
                            <li class="d-flex mb-35">
                                <div class="contact__info-icon mr-20">
                                    <i class="fal fa-envelope-open-text"></i>
                                </div>
                                <div class="contact__info-content">
                                    <h6>Email:</h6>
                                    <span>{{ $contact->email }}</span>
                                </div>
                            </li>
                            <li class="d-flex mb-35">
                                <div class="contact__info-icon mr-20">
                                    <i class="fal fa-phone-alt"></i>
                                </div>
                                <div class="contact__info-content">
                                    <h6>Number Phone:</h6>
                                    <span>{{ $contact->phone_one }}, {{ $contact->phone_two }}</span>
                                </div>
                            </li>
                        </ul>
                        <p>{{ $contact->description }}</p>

                        <div class="contact__social">
                            <ul>
                                <li><a href="{{ $contact->dribbble }}"><i class="fab fa-dribbble"></i></a></li>
                                <li><a href="{{ $contact->facebook }}"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="{{ $contact->twitter }}"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="{{ $contact->behance }}"><i class="fab fa-behance"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="contact__form">
                        <h3>Contact Us.</h3>
                        <form action="assets/mail.php" id="contact-form">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6">
                                    <div class="contact__input">
                                        <label>Name <span class="required">*</span></label>
                                        <input type="text">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6">
                                    <div class="contact__input">
                                        <label>Email <span class="required">*</span></label>
                                        <input type="email">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="contact__input">
                                        <label>Subject <span class="required">*</span></label>
                                        <input type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="contact__input">
                                        <label>Message</label>
                                        <textarea cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="contact__submit">
                                        <button type="submit" class="os-btn os-btn-black">Send Message</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <p class="ajax-response"></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact area end -->

    <!-- contact map area start -->
    <section class="contact__map">
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                <div class="col-xl-12">
                    <div class="contact__map-wrapper p-relative">
                        <iframe src="{{ $contact->map_api }}"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact map area end -->

    <!-- subscribe area start -->

    @include('frontend.include.newslatter')

@endsection
