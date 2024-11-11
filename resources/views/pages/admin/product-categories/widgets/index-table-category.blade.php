<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped align-middle" id="table-categories">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kategori</th>
                        <th>Jumlah Produk</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 0; $i < 25; $i++)
                        <tr>
                            <th>{{ $i + 1 }}</th>
                            <td>
                                <div class="">
                                    <div class="fw-bolder">Kategori {{ $i + 1 }}</div>
                                    <div class="text-truncate" style="max-width: 400px;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis perspiciatis fuga eos.</div>
                                </div>
                            </td>
                            <td><span class="badge bg-light-primary text-primary">100</span></td>
                            <td>
                                <div class="d-flex align-items-center gap-1">
                                    <button type="button" class="btn btn-primary p-2" data-bs-toggle="modal" data-bs-target="#modal-detail-category"><div class="ti ti-eye"></div></button>
                                    <button type="button" class="btn btn-warning p-2" data-bs-toggle="modal" data-bs-target="#modal-edit-category"><div class="ti ti-edit"></div></button>
                                    <button type="button" class="btn btn-danger p-2 btn-delete-category"><div class="ti ti-trash"></div></button>
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

            $(document).on('click', '.btn-delete-category', function() {
                Swal.fire({
                    icon: 'question',
                    title: 'Apakah anda yakin?',
                    text: 'Data kategori akan dihapus!',
                    showCancelButton: true,
                    cancelButtonText: 'Batal',
                    confirmButtonText: 'Yakin'
                })
            })
        })
    </script>
@endpush