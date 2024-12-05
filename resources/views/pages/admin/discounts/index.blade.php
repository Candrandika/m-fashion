@extends('layouts.admin.index')

@section('subtitle', 'Diskon')

@section('content')
    @include('components.alerts.index')

    <div class="d-flex align-items-end justify-content-between mb-2">
        <h2 class="fw-bolder mb-0">Diskon</h2>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-add-discount">+ Tambah</button>
    </div>

    @include('pages.admin.discounts.widgets.index-table-discount')
    @include('pages.admin.discounts.widgets.index-modal-show-image')
    @include('pages.admin.discounts.widgets.index-modal-create-discount')
    @include('pages.admin.discounts.widgets.index-modal-edit-discount')
@endsection

@push('script')
    <script src="{{ asset('dist/libs/datatables/datatables.min.js') }}"></script>
@endpush
@push('style')
    <link rel="stylesheet" href="{{ asset('dist/libs/datatables/datatables.min.css') }}">
@endpush
