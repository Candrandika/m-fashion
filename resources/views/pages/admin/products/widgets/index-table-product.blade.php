<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped align-middle" id="table-products">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Produk</th>
                        <th>Stok</th>
                        <th>Terjual</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 0; $i < 25; $i++)
                        <tr>
                            <th>{{ $i + 1 }}</th>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <img src="{{ asset('dist/images/products/s6.jpg') }}" class="rounded object-fit-cover" width="40" height="40" alt="">
                                    <div>
                                        <div class="fw-bolder">Produk {{ $i + 1 }}</div>
                                        <div class="d-flex gap-2">
                                            <span class="badge bg-light-warning text-warning">Brand</span>
                                            <span class="badge bg-light-success text-success">Kategori</span>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td><span class="badge bg-light-secondary text-secondary">100</span></td>
                            <td><span class="badge bg-light-primary text-primary">100</span></td>
                            <td>
                                <div class="d-flex align-items-center gap-1">
                                    <a href="{{ route('admin.products.show', $i + 1) }}" class="btn btn-primary p-2"><div class="ti ti-eye"></div></a>
                                    <button type="button" class="btn btn-warning p-2" data-bs-toggle="modal" data-bs-target="#modal-edit-product"><div class="ti ti-edit"></div></button>
                                    <button type="button" class="btn btn-danger p-2 btn-delete-product"><div class="ti ti-trash"></div></button>
                                </div>
                            </td>
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
            $('#table-products').DataTable();

            $(document).on('click', '.btn-delete-product', function() {
                Swal.fire({
                    icon: 'question',
                    title: 'Apakah anda yakin?',
                    text: 'Data produk akan dihapus!',
                    showCancelButton: true,
                    cancelButtonText: 'Batal',
                    confirmButtonText: 'Yakin'
                })
            })
        })
    </script>
@endpush