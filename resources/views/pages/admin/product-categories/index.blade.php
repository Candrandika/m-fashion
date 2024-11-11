@extends('layouts.admin.index')

@section('subtitle', 'Kategori Produk')

@section('content')
    @include('components.alerts.index')
    <div class="d-flex align-items-end justify-content-between mb-2">
        <h2 class="fw-bolder mb-0">Kategori Produk</h2>
        <button data-bs-toggle="modal" data-bs-target="#modal-create-category" class="btn btn-primary" type="button">+ Tambah</button>
    </div>
    @include('pages.admin.product-categories.widgets.index-table-category')
    @include('pages.admin.product-categories.widgets.index-modal-create')
    @include('pages.admin.product-categories.widgets.index-modal-edit')
    @include('pages.admin.product-categories.widgets.index-modal-detail')
@endsection

@push('script')
    <script src="{{ asset('dist/libs/datatables/datatables.min.js') }}"></script>
@endpush
@push('script')
    <link rel="stylesheet" href="{{ asset('dist/libs/datatables/datatables.min.css') }}">
@endpush