<div class="card">
    <div class="card-header">
        <h5 class="card-title m-0">Produk Terlaris</h5>
    </div>
    <div class="card-body">
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
            $('#top-product-table').DataTable({
                order: [[2, 'desc']],
                searching: false,
                paging: false,
                info: false,
                columnDefs: [
                    {width: '20px', targets: 0},
                ]
            });
        })
    </script>
@endpush