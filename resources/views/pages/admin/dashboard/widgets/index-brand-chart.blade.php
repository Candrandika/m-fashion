<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title m-0">Produk dalam Brand</h5>
        <div>
            <select name="year" id="year" class="form-select">
                <option value="">Filter Tahun</option>
                <option value="2024">2024</option>
            </select>
        </div>
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
                series: [10, 13, 8,],
                labels: ['H&M', 'Uniqlo', 'Adidas'],
                legend: {
                    show: false
                }
            }

            let chart = new ApexCharts(document.querySelector('#brand-chart'), options);
            chart.render();
        })
    </script>
@endpush