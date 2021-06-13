<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Metabox -->
    @include('backend.include.header')

    <!-- Css -->
    @include('backend.include.css')
</head>

<body class="hold-transition login-page">

        <!-- Preloader -->
        @include('backend.include.preloader')


        @yield('body')


        <!-- Right Bar -->
        @include('backend.include.rightbar')
    <!-- Scripts -->
    @include('backend.include.script')

</body>

</html>
