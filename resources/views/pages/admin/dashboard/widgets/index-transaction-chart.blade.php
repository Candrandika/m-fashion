<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title m-0">Data Transaksi</h5>
    </div>
    <div class="card-body">
        <div id="transaction-history-chart" style="max-height: 100px;"></div>
    </div>
</div>


@push('script')
    <script>
        $(document).ready(function() {
            let options = {
                chart: {
                    type: 'area',
                    height: 325
                },
                dataLabels: {
                    enabled: false
                },
                series: [{
                    name: 'Data Penjualan',
                    data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
                }],
                xaxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Dec']
                }
            }

            transaction_chart = new ApexCharts(document.querySelector('#transaction-history-chart'), options);
            transaction_chart.render();
        })

        function updateTransactionChart(data) {
            const formatted_data = Object.values(data)

            transaction_chart.updateSeries([{
                name: 'Data Penjualan',
                data: formatted_data
            }])
        }
    </script>
@endpush
