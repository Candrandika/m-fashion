@extends('layouts.admin.index')

@section('subtitle', 'Pengguna')

@section('content')
    @include('components.alerts.index')
    <div class="d-flex align-items-end justify-content-between mb-2">
        <h2 class="fw-bolder mb-0">Pengguna</h2>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-create-user">+ Tambah</button>
    </div>
    @include('pages.admin.users.widgets.index-table-user')
    @include('pages.admin.users.widgets.index-modal-create')
    @include('pages.admin.users.widgets.index-modal-edit')
@endsection

@push('script')
    <script src="{{ asset('dist/libs/datatables/datatables.min.js') }}"></script>
@endpush

@push('script')
    <link rel="stylesheet" href="{{ asset('dist/libs/datatables/datatables.min.css') }}">
@endpush