<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    @yield('meta')

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Css -->
    @include('frontend.include.css')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        @include('frontend.include.preloader')

        <!-- Navigation-->
        @include('frontend.include.menu')


        <main>
            @yield('body')

        </main>

        <!-- Footer -->
        @include('frontend.include.footer')

    </div>
    <!-- Scripts -->
    @include('frontend.include.script')

</body>

</html>
