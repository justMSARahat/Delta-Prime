<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <!-- Metabox -->
    @include('frontend.include.header')

    <!-- Css -->
    @include('frontend.include.css')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        @include('frontend.include.preloader')

        <!-- Navigation-->
        @include('frontend.include.menu_two')


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
