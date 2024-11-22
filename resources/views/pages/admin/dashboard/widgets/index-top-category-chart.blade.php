<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title m-0">Kategori terlaris</h5>
        <div>
            <select name="year" id="year" class="form-select">
                <option value="">Filter Tahun</option>
                <option value="2024">2024</option>
            </select>
        </div>
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
                series: [100, 153, 81, 218, 89],
                labels: ['sepatu', 'celana', 'jaket', 'baju', 'sarung tangan'],
                legend: {
                    show: false
                }
            }

            let chart = new ApexCharts(document.querySelector('#top-category-chart'), options);
            chart.render();
        })
    </script>
@endpush