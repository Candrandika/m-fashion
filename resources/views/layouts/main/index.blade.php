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

    @stack('style')
</head>

<body>
    <div class="d-flex flex-column" style="min-height: 100dvh;">
        @include('layouts.main.header')
        <div class="wrapper" style="flex: 1">
            @yield('content')
        </div>
        @include('layouts.main.footer')
        <div style="top: 0;height: 70vh;" class="offcanvas offcanvas-bottom" tabindex="-1" id="offcanvasBottom" aria-labelledby="offcanvasBottomLabel">
            <div class="offcanvas-header d-flex justify-content-between">
              <span></span>
              <img src="{{ asset('dist/logos/full-dark.png') }}" alt="Logo" height="30">
              <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              <div class="container row">
                <div class="col-md-4">
                  <a href="" class="d-block fs-5 fw-bold text-black">Wanita</a>
                  <a href="" class="d-block fs-5 fw-bold text-black">Pria</a>
                  <a href="" class="d-block fs-5 fw-bold text-black">Anak</a>
                  <a href="" class="d-block fs-5 fw-bold text-black">Informasi</a>
                  <a href="" class="d-block text-black">Tentang MFashion</a>
                  <a href="" class="d-block text-black">CSR</a>
                  <a href="" class="d-block text-black">Sustainabillity</a>
                  <a href="" class="d-block text-black">Customer Service</a>
                  <a href="" class="d-block text-black">Lokasi Toko</a>
                </div>
                <div class="col-md-8">
                  <h4>Promo</h4>
                  <div class="d-flex align-items-stretch justify-content-center rounded overflow-hidden">
                    <img src="{{ asset('dist/images/profile/user-1.jpg') }}" alt="" class="rounded-start d-none d-lg-block" height="300px">
                    <div class="bg-danger d-flex flex-column justify-content-center p-5 text-light" style="flex: 1; height: 300px">
                        <div class="lead">PENAWARAN KHUSUS</div>
                        <h1 class="m-0 text-light fw-bolder">Diskon 35% hanya minggu ini dan dapatkan hadiah istimewa</h1>
                    </div>
                </div>
                </div>
              </div>
            </div>
          </div>
    </div>

    <!--  Import Js Files -->
    <script src="{{ asset('dist/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dist/libs/sweetalert2/dist/sweetalert2.min.js') }}"></script>

    @stack('script')
</body>

</html>
