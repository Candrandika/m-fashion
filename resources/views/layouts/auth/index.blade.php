<!DOCTYPE html>
<html lang="en">

<head>
    <title>MFashion | @yield('subtitle')</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Tingkatkan Penampilanmu Disini" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" type="image/png" href="{{ asset('dist/logos/favicon.ico') }}" />

    <link id="themeColors" rel="stylesheet" href="{{ asset('dist/css/style.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist/libs/sweetalert2/dist/sweetalert2.min.css') }}">

    <style>
        .custom-input::placeholder {
            color: #444;
        }
        .custom-input {
            color: #000!important;
        }
    </style>

    @stack('style')
</head>

<body>
    @if (!Route::is('auth.home'))
        <a href="/" style="position: absolute; top: 20px; left: 20px;" class="d-flex gap-2">
            <i class="ti ti-chevron-left text-white fs-7"></i>
            <img src="{{ asset('dist/logos/full-light.png') }}" height="20" alt="Logo MFashion">
        </a>
    @endif
    <div style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('dist/images/backgrounds/auth-page-bg.png') }}'); background-size: cover; width: 100vw; height: 100dvh; display: grid; place-content: center; position: fixed; z-index: -1"></div>
    <div style="width: 100vw; min-height: 100dvh; display: grid; place-content: center;" class="p-4">
        @yield('content')
    </div>

    <!--  Import Js Files -->
    <script src="{{ asset('dist/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dist/libs/sweetalert2/dist/sweetalert2.min.js') }}"></script>

    @stack('script')
</body>

</html>
