
<!-- Place favicon.ico in the root directory -->
<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

<!-- CSS here -->
<link rel="stylesheet" href="{{ asset('Frontend/assets/css/preloader.css') }}">
<link rel="stylesheet" href="{{ asset('Frontend/assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('Frontend/assets/css/slick.css') }}">
<link rel="stylesheet" href="{{ asset('Frontend/assets/css/metisMenu.css') }}">
<link rel="stylesheet" href="{{ asset('Frontend/assets/css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('Frontend/assets/css/animate.min.css') }}">
<link rel="stylesheet" href="{{ asset('Frontend/assets/css/jquery.fancybox.min.css') }}">
<link rel="stylesheet" href="{{ asset('Frontend/assets/css/fontAwesome5Pro.css') }}">
<link rel="stylesheet" href="{{ asset('Frontend/assets/css/ionicons.min.css') }}">
<link rel="stylesheet" href="{{ asset('Frontend/assets/css/default.css') }}">
<link rel="stylesheet" href="{{ asset('Frontend/assets/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('Frontend/assets/css/ui-range-slider.css') }}">

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

    @php
        $webinfo    = App\Models\Backend\webinfo::orderBy('id','asc')->first();
    @endphp
    @if ( !is_null($webinfo->favicon) )
        <link rel="shortcut icon" href="{{ asset('Backend/Image/Website/' .$webinfo->favicon) }}" type="image/x-icon">
    @endif

</head>

<style>
    .pag_border{
        height: 35px;
        width: 35px;
        background: transparent;
        color: #201f1f;
        font-size: 12px;
        font-weight: 500;
        line-height: 31px;
        margin: 0px;
        display: inline-block;
        text-align: center;
        border: 2px solid #ebebeb;
    }
    .slide_image {
        width: 100%;
        height: 130px !important;
        width: 102px !important;
    }
</style>
