<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title m-0">Kategori terlaris</h5>
    </div>
    <div class="card-body">
        <div id="top-category-chart" style="max-height: 100px;"></div>
    </div>
</div>

@push('script')
    <script>
        $(document).ready(function() {
            let options = {
                chart: {
                    type: 'donut',
                    height: 360
                },
                series: [],
                labels: [],
                legend: {
                    show: false
                }
            }

            category_chart = new ApexCharts(document.querySelector('#top-category-chart'), options);
            category_chart.render();
        })

        function updateCategoryChart(data) {
            const series = data.map((d) => (parseFloat(d.total_sold)))
            const labels = data.map((d) => (d.name))
            let colors = undefined

            if(data.length == 0) {
                series.push('kosong')
                labels.push(1)
                colors = ['#f0f0f0']
            }

            category_chart.updateOptions({
                series,
                labels,
                colors
            })
        }
    </script>
@endpush