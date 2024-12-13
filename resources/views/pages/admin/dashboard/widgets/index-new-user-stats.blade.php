<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title m-0">Data Pendaftartan Pengguna</h5>
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
                    name: 'Pengguna Mendaftar',
                    data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
                }],
                xaxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Dec']
                }
            }

            user_chart = new ApexCharts(document.querySelector('#transaction-history-new-user'), new_user_options);
            user_chart.render();
        })

        function updateUserChart(data) {
            const formatted_data = Object.values(data)

            user_chart.updateSeries([{
                name: 'Pengguna Mendaftar',
                data: formatted_data
            }])
        }
    </script>
@endpush
