<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Metabox -->
    @include('backend.include.header')

    <!-- Css -->
    @include('backend.include.css')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        @include('backend.include.preloader')


        <!-- Left Menu -->
        @include('backend.include.aside')

        @yield('body')

        <!-- Footer -->
        @include('backend.include.footer')

        <!-- Right Bar -->
        @include('backend.include.rightbar')
    </div>
    <!-- Scripts -->
    @include('backend.include.script')

</body>

</html>
