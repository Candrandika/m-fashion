<!DOCTYPE html>
<html lang="en">

<head>
    <title>MFashion | @yield('subtitle')</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="handheldfriendly" content="true" />
    <meta name="MobileOptimized" content="width" />
    <meta name="description" content="Tingkatkan Penampilanmu Disini" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="shortcut icon" type="image/png" href="{{ asset('dist/logos/favicon.ico') }}" />

    <link id="themeColors" rel="stylesheet" href="{{ asset('dist/css/style.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist/libs/sweetalert2/dist/sweetalert2.min.css') }}">
    <style>
        .app-header:not(.fixed-header) {
            background-color: white;
        }
        .dt-column-title {
            text-wrap-mode: nowrap;
        }
        .table tbody th, .table tbody td, .table thead th, .table thead td {
            text-align: start!important;
        }
    </style>

    @stack('style')
</head>

<body style="background-color: #f7f7f7;">
    <!-- Preloader -->
    <div class="preloader">
        <img src="{{ asset('dist/logos/mini-dark.png') }}"
            alt="loader" class="lds-ripple img-fluid" />
    </div>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-theme="blue_theme" data-layout="vertical" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        @include('layouts.admin.aside')
        <!--  Main wrapper -->
        <div class="body-wrapper">
            @include('layouts.admin.header')
            <div class="container-fluid" style="max-width: 100%;">
                @yield('content')
            </div>
        </div>
    </div>

    <!--  Import Js Files -->
    <script src="{{ asset('dist/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('dist/libs/simplebar/dist/simplebar.min.js') }}"></script>
    <script src="{{ asset('dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dist/js/app.min.js') }}"></script>
    <script src="{{ asset('dist/js/app.init.js') }}"></script>
    <script src="{{ asset('dist/js/app-style-switcher.js') }}"></script>
    <script src="{{ asset('dist/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('dist/js/custom.js') }}"></script>
    <script src="{{ asset('dist/libs/sweetalert2/dist/sweetalert2.min.js') }}"></script>

    @stack('script')
</body>

</html>
