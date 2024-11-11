<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped align-middle" id="table-categories">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Brand</th>
                        <th>Jumlah Produk</th>
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
                                    <div class="fw-bolder">Brand {{ $i + 1 }}</div>
                                </div>
                            </td>
                            <td><span class="badge bg-light-primary text-primary">100</span></td>
                            <td>
                                <div class="d-flex align-items-center gap-1">
                                    <button type="button" class="btn btn-warning p-2" data-bs-toggle="modal" data-bs-target="#modal-edit-brand"><div class="ti ti-edit"></div></button>
                                    <button type="button" class="btn btn-danger p-2 btn-delete-brand"><div class="ti ti-trash"></div></button>
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
            $('#table-categories').DataTable();

            $(document).on('click', '.btn-delete-brand', function() {
                Swal.fire({
                    icon: 'question',
                    title: 'Apakah anda yakin?',
                    text: 'Data brand akan dihapus!',
                    showCancelButton: true,
                    cancelButtonText: 'Batal',
                    confirmButtonText: 'Yakin'
                })
            })
        })
    </script>
@endpush