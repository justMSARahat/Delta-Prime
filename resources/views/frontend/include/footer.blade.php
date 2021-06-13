@php
    $footer    = App\Models\Backend\footer::orderBy('id','asc')->first();
@endphp
<section class="footer__area footer-bg">
    <div class="footer__top pt-100 pb-60">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                    <div class="footer__widget mb-30">
                        <div class="footer__widget-title mb-25">
                            <a href="index.html"><img src="{{ asset('Frontend/assets/img/logo/logo-2.png') }}" alt="logo"></a>
                        </div>
                        <div class="footer__widget-content">
                            {!! $footer->description !!}
                            <div class="footer__contact">
                                <ul>
                                    <li>
                                        <div class="icon">
                                            <i class="fal fa-map-marker-alt"></i>
                                        </div>
                                        <div class="text">
                                            <span>Address: {{ $footer->address }}</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <i class="fal fa-envelope-open-text"></i>
                                        </div>
                                        <div class="text">
                                            <span>Email: {{ $footer->email }}</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <i class="fal fa-phone-alt"></i>
                                        </div>
                                        <div class="text">
                                            <span>Phone Number: {{ $footer->phone }}</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-12">
                    <div class="footer__widget mb-30">
                        <div class="footer__widget-title">
                            <h5>{{ $footer->title_one }}</h5>
                        </div>
                        <div class="footer__widget-content">
                            <div class="footer__links">
                                 {!! $footer->title_one_desc !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-12">
                    <div class="footer__widget mb-30">
                        <div class="footer__widget-title mb-25">
                            <h5>{{ $footer->title_two }}</h5>
                        </div>
                        <div class="footer__widget-content">
                            <div class="footer__links">
                                {!! $footer->title_two_desc !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer__bottom">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-7">
                    <div class="footer__copyright">
                        {!! $footer->copywrite !!}
                    </div>
                </div>
                <div class="col-xl-6 col-lg-5">
                    <div class="footer__social f-right">
                        <ul>
                            <li><a href="{{ $footer->dribbble }}"><i class="fab fa-dribbble"></i></a></li>
                            <li><a href="{{ $footer->facebook }}"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="{{ $footer->twitter }}"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="{{ $footer->behance }}"><i class="fab fa-behance"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
