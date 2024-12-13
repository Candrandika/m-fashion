@extends('layouts.admin.index')

@section('subtitle', 'Dashboard')

@section('content')
    <div class="d-flex align-items-center justify-content-between mb-2">
        <h2 class="fw-bolder m-0">Dashboard</h2>
        <select name="year" id="year" class="form-select w-auto bg-white">
            @foreach ($year as $index => $value)
                <option value="{{ $value }}">{{ $value }}</option>
            @endforeach
        </select>
    </div>
    @include('pages.admin.dashboard.widgets.index-scorecard')
    <div class="row">
        <div class="col-xxl-8">
            @include('pages.admin.dashboard.widgets.index-transaction-chart')
        </div>
        <div class="col-xxl-4 col-lg-6">
            @include('pages.admin.dashboard.widgets.index-top-category-chart')
        </div>
        <div class="col-xxl-4 col-lg-6">
            @include('pages.admin.dashboard.widgets.index-brand-chart')
        </div>
        <div class="col-xxl-8">
            @include('pages.admin.dashboard.widgets.index-new-user-stats')
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
    <script>
        $(document).ready(function() {

            $(document).on('change', '#year', updateDashboardData)

            updateDashboardData()

            function updateDashboardData() {
                $.ajax({
                    url: "{{ route('data.dashboard') }}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        year: $('#year').val()
                    },
                    success: function(res) {
                        const data = res.data

                        console.log({data})

                        // scorecard
                        updateScorecard(data.card)
                        updateTransactionChart(data.chart_transaction)
                        updateBrandChart(data.brand_best_seller)
                        updateUserChart(data.chart_user)
                        updateCategoryChart(data.category_best_seller)
                        updateNewestTransactionTable(data.new_transaction)
                        updateBestProductTable(data.product_best_seller)
                    }
                })
            }
        })
    </script>
@endpush
@push('style')
    <link rel="stylesheet" href="{{ asset('dist/libs/datatables/datatables.min.css') }}">
    <script>
        const formatNum = new Intl.NumberFormat('id-ID')
        const formatRp = new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0,
            maximumFractionDigits: 0,
        })

        let transaction_chart, brand_chart, category_chart, user_chart;
        let best_product_table, newest_transaction_table
    </script>
@endpush