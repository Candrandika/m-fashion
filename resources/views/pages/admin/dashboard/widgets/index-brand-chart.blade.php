<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title m-0">Produk dalam Brand</h5>
    </div>
    <div class="card-body">
        <div id="brand-chart" style="max-height: 100px;"></div>
    </div>
</div>

@push('script')
    <script>
        $(document).ready(function() {
            let options = {
                chart: {
                    type: 'pie',
                    height: 360
                },
                series: [],
                labels: [],
                legend: {
                    show: false
                }
            }

            brand_chart = new ApexCharts(document.querySelector('#brand-chart'), options);
            brand_chart.render();
        })

        function updateBrandChart(data) {
            const series = data.map((d) => (parseFloat(d.total_sold)))
            const labels = data.map((d) => (d.name))
            let colors = undefined

            if(data.length == 0) {
                series.push('kosong')
                labels.push(1)
                colors = ['#f0f0f0']
            }

            brand_chart.updateOptions({
                series,
                labels,
                colors
            })
        }
    </script>
@endpush