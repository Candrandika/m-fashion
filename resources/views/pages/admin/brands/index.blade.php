@extends('layouts.admin.index')

@section('subtitle', 'Brand')

@section('content')
    @include('components.alerts.index')
    <div class="d-flex align-items-end justify-content-between mb-2">
        <h2 class="fw-bolder mb-0">Brand</h2>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-create-brand">+ Tambah</button>
    </div>
    @include('pages.admin.brands.widgets.index-table-brand')
    @include('pages.admin.brands.widgets.index-modal-create-brand')
    @include('pages.admin.brands.widgets.index-modal-edit-brand')
@endsection

@push('script')
    <script src="{{ asset('dist/libs/datatables/datatables.min.js') }}"></script>
@endpush

@push('script')
    <link rel="stylesheet" href="{{ asset('dist/libs/datatables/datatables.min.css') }}">
@endpush