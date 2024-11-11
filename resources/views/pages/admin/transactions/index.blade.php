@extends('layouts.admin.index')

@section('subtitle', 'Transaksi')

@section('content')
    @include('components.alerts.index')
    <div class="d-flex align-items-end justify-content-between mb-2">
        <h2 class="fw-bolder mb-0">Transaksi</h2>
    </div>
    @include('pages.admin.transactions.widgets.index-table-transaction')
    @include('pages.admin.transactions.widgets.index-modal-detail-transaction')
    @include('pages.admin.transactions.widgets.index-modal-edit-status-transaction')
@endsection

@push('script')
    <script src="{{ asset('dist/libs/datatables/datatables.min.js') }}"></script>
@endpush

@push('script')
    <link rel="stylesheet" href="{{ asset('dist/libs/datatables/datatables.min.css') }}">
@endpush