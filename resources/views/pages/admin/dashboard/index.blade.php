@extends('layouts.admin.index')

@section('subtitle', 'Dashboard')

@section('content')
    <h2 class="fw-bolder">Dashboard</h2>
    @include('pages.admin.dashboard.widgets.index-scorecard')
    <div class="row">
        <div class="col-xxl-8">
            @include('pages.admin.dashboard.widgets.index-transaction-chart')
        </div>
        <div class="col-xxl-4">
            @include('pages.admin.dashboard.widgets.index-top-category-chart')
        </div>
        <div class="col-xxl-5">
            @include('pages.admin.dashboard.widgets.index-top-product')
        </div>
        <div class="col-xxl-7">
            @include('pages.admin.dashboard.widgets.index-newest-transaction')
        </div>
    </div>
@endsection

@push('script')
    <script src="{{ asset('dist/libs/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('dist/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
@endpush
@push('style')
    <link rel="stylesheet" href="{{ asset('dist/libs/datatables/datatables.min.css') }}">
@endpush