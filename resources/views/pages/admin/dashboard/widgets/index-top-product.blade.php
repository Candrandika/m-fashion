<div class="card">
    <div class="card-header">
        <h5 class="card-title m-0">Produk Terlaris</h5>
    </div>
    <div class="card-body pt-0">
        <div class="table-responsive">
            <table class="table table-striped align-middle" id="top-product-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Produk</th>
                        <th>Jumlah Terjual</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 0; $i < 5; $i++)
                        <tr>
                            <th>{{ $i + 1 }}</th>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <img src="{{ asset('dist/images/products/s7.jpg') }}" class="rounded object-fit-cover" width="40" height="40">
                                    <div>
                                        <div class="fw-bolder">Produk {{ $i + 1 }}</div>
                                        <div class="text-truncate" style="min-width: 200px; max-width: 300px">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod.</div>
                                    </div>
                                </div>
                            </td>
                            <td>{{ 100 - ($i *7) }}</td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </div>
</div>

@push('script')
    <script>
        $(document).ready(function() {
            best_product_table = $('#top-product-table').DataTable({
                order: [[2, 'desc']],
                searching: false,
                paging: false,
                info: false,
                columnDefs: [
                    {width: '20px', targets: 0},
                ]
            });
        })

        function updateBestProductTable(data) {
            const allRows = []
            data.forEach((d, index) => {
                const asset = "{{ asset('storage') }}"

                const row = [
                    index+1,
                    `<div class="d-flex align-items-center gap-3">
                        <img src="${asset+'/'+d.image}" class="rounded object-fit-cover" width="40" height="40">
                        <div>
                            <div class="fw-bolder">${d.name}</div>
                            <div class="">${formatRp.format(d.price)}</div>
                        </div>
                    </div>`,
                    d.details_sum_sold ?? '-'
                ]
                allRows.push(row)
            })

            best_product_table.clear()
            best_product_table.rows.add(allRows)
            best_product_table.draw()
        }
    </script>
@endpush