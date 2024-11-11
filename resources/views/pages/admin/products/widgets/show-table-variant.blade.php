<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="m-0 fw-semibold" >Data Ukuran</h4>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-create-variant">+ Tambah Ukuran</button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped align-middle" id="table-variant">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Ukuran (l &times; t)</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $data_size = ['XS', 'S', 'M', 'L', 'XL', 'XXL'];
                    @endphp
                    @foreach ($data_size as $size )
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $size }}</td>
                            <td>Rp 100.000</td>
                            <td>9</td>
                            <td>54cm &times; 74cm</td>
                            <td>
                                <button type="button" class="btn btn-warning p-2" data-bs-toggle="modal" data-bs-target="#modal-edit-variant"><div class="ti ti-edit"></div></button>
                                <button type="button" class="btn btn-danger p-2 btn-delete-variant"><div class="ti ti-trash"></div></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@push('script')
    <script>
        $(document).ready(function() {
            $('#table-variant').DataTable();

            $(document).on('click', '.btn-delete-variant', function() {
                Swal.fire({
                    icon: 'question',
                    title: 'Apakah anda yakin?',
                    text: 'Data ukuran akan dihapus dari produk ini!',
                    showCancelButton: true,
                    cancelButtonText: 'Batal',
                    confirmButtonText: 'Yakin'
                })
            })
        })
    </script>
@endpush