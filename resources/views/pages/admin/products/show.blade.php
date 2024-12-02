@extends('layouts.admin.index')

@section('subtitle', 'Produk')

@section('content')
    @include('components.alerts.index')
    <div class="d-flex align-items-end justify-content-between mb-2">
        <h2 class="fw-bolder mb-0">Detail Produk</h2>
    </div>
    @include('pages.admin.products.widgets.show-card-detail-product')
    @include('pages.admin.products.widgets.show-modal-add-image')

    @include('pages.admin.products.widgets.show-table-size')
    @include('pages.admin.products.widgets.show-modal-create-size')
    @include('pages.admin.products.widgets.show-modal-edit-size')

    @include('pages.admin.products.widgets.show-table-color')
    @include('pages.admin.products.widgets.show-modal-create-color')
    @include('pages.admin.products.widgets.show-modal-edit-color')

    @include('pages.admin.products.widgets.show-table-variant')
    @include('pages.admin.products.widgets.show-modal-create-variant')
    @include('pages.admin.products.widgets.show-modal-edit-variant')
@endsection

@push('script')
    <script src="{{ asset('dist/libs/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('dist/libs/owl.carousel/dist/owl.carousel.min.js') }}"></script>
    <script>
        $(document).ready(function() {
        //
        // Carousel
        //
        $(".counter-carousel").owlCarousel({
            loop: true,
            rtl: true,
            margin: 5,
            mouseDrag: true,

            nav: false,

            responsive: {
            0: {
                items: 2,
                loop: true,
            },
            576: {
                items: 2,
                loop: true,
            },
            768: {
                items: 3,
                loop: true,
            },
            1200: {
                items: 4,
                loop: true,
            },
            1400: {
                items: 4,
                loop: true,
            },
            },
        });
        })
    </script>
@endpush

@push('style')
    <link rel="stylesheet" href="{{ asset('dist/libs/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/libs/owl.carousel/dist/assets/owl.carousel.min.css') }}" />
@endpush