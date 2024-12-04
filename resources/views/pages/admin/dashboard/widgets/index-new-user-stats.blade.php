<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title m-0">Data Pendaftartan Pengguna</h5>
        <div>
            <select name="year" id="year" class="form-select">
                <option value="">Filter Tahun</option>
                <option value="2024">2024</option>
            </select>
        </div>
    </div>
    <div class="card-body">
        <div id="transaction-history-new-user" style="max-height: 100px;"></div>
    </div>
</div>


@push('script')
    <script>
        $(document).ready(function() {
            let new_user_options = {
                chart: {
                    type: 'bar',
                    height: 325
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

            let new_user_chart = new ApexCharts(document.querySelector('#transaction-history-new-user'), new_user_options);
            new_user_chart.render();
        })
    </script>
@endpush
