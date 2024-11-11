<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title m-0">Data Transaksi</h5>
        <div>
            <select name="year" id="year" class="form-select">
                <option value="">Filter Tahun</option>
                <option value="2024">2024</option>
            </select>
        </div>
    </div>
    <div class="card-body">
        <div id="transaction-history-chart" style="max-height: 100px;"></div>
    </div>
</div>


@push('script')
    <script src="{{ asset('dist/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            let options = {
                chart: {
                    type: 'area',
                    height: 350
                },
                dataLabels: {
                    enabled: false
                },
                series: [{
                    name: 'Data Penjualan',
                    data: [30, 40, 35, 50, 49, 60, 70, 91, 125, 70, 91, 125]
                }],
                xaxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Dec']
                }
            }

            let chart = new ApexCharts(document.querySelector('#transaction-history-chart'), options);
            chart.render();
        })
    </script>
@endpush
