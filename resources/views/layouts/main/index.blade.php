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
    <link rel="stylesheet" href="{{ asset('dist/css/custom.css') }}">

    <style>
        .unstyled>* {
            margin: 0;
        }

        .mb-4 {
            margin-bottom: 2rem !important;
        }
    </style>
    @stack('style')
</head>

<body>
    <a href="https://wa.me/6285710173297" target="_blank" class="position-fixed" style="right: 15px; bottom: 15px;">
        <img src="{{ asset('dist/images/icons/headset.png') }}" alt="" class="bg-dark p-2 rounded-circle"
            width="50">
    </a>
    <div class="d-flex flex-column" style="min-height: 100dvh;">
        @include('layouts.main.header')
        <div class="wrapper" style="flex: 1">
            @yield('content')
        </div>
        @include('layouts.main.footer')
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasBottom"
            aria-labelledby="offcanvasBottomLabel" style="min-width: 50%;">
            <div class="offcanvas-header d-flex flex-row-reverse justify-content-start align-items-center gap-3">
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
                @php
                    $categories_header = \App\Models\Category::limit(5)->get();
                @endphp
                @foreach ($categories_header as $cat)
                    <a href="{{ route('categories.show', $cat->id) }}"
                        class="text-uppercase text-muted fs-3 fw-semibold"
                        style="text-wrap: nowrap;">{{ $cat->name }}</a>
                @endforeach
            </div>
            <div class="offcanvas-body">
                <div class="d-flex flex-row-reverse gap-3 justify-content-between h-100 pt-4">
                    <div class="d-flex flex-column justify-content-between">
                        <div class="d-flex flex-column gap-1 text-end">
                            <a href="#" class="h4 m-0 text-uppercase text-black fw-bolder">Barang Baru</a>
                            <a href="#" class="h4 m-0 text-uppercase text-black fw-bolder">Promo 12.12</a>
                            <a href="#" class="h4 m-0 text-uppercase text-black fw-bolder">Kategori Produk</a>
                        </div>
                        <div class="d-flex flex-column text-end">
                            <a href="/about" class="text-uppercase text-black fw-bolder">Tentang Kami</a>
                            <a href="/location" class="text-uppercase text-black fw-bolder">Lokasi Toko</a>
                            <a href="/contact-us" class="text-uppercase text-black fw-bolder">Sosial Media</a>
                            <a href="https://wa.me/6285710173297" target="_blank" class="text-uppercase text-black fw-bolder">Customer Service</a>
                        </div>
                    </div>
                    <div class="d-flex flex-column gap-5" style="max-width: 200px; overflow: auto;">
                        <div>
                            <img src="{{ asset('dist/images/profile/user-1.jpg') }}" alt="" class="d-none d-lg-block w-100">
                            <h6 class="m-0 mt-2 fw-bolder text-uppercase">Diskon 12.12</h6>
                        </div>
                        <div>
                            <img src="{{ asset('dist/images/profile/user-1.jpg') }}" alt="" class="d-none d-lg-block w-100">
                            <h6 class="m-0 mt-2 fw-bolder text-uppercase">Diskon 12.12</h6>
                        </div>
                        <div>
                            <img src="{{ asset('dist/images/profile/user-1.jpg') }}" alt="" class="d-none d-lg-block w-100">
                            <h6 class="m-0 mt-2 fw-bolder text-uppercase">Diskon 12.12</h6>
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
