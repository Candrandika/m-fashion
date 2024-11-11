@extends('layouts.admin.index')

@section('subtitle', 'Produk')

@section('content')
    @include('components.alerts.index')
    <div class="d-flex align-items-end justify-content-between mb-2">
        <h2 class="fw-bolder mb-0">Detail Produk</h2>
    </div>
    @include('pages.admin.products.widgets.show-card-detail-product')
    @include('pages.admin.products.widgets.show-table-variant')
    @include('pages.admin.products.widgets.show-modal-create-variant')
    @include('pages.admin.products.widgets.show-modal-edit-variant')
@endsection

@push('script')
    <script src="{{ asset('dist/libs/datatables/datatables.min.js') }}"></script>
@endpush

@push('style')
    <link rel="stylesheet" href="{{ asset('dist/libs/datatables/datatables.min.css') }}">
@endpush