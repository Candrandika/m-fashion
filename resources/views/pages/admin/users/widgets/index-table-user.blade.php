<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped align-middle" id="table-categories">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>No. Telp</th>
                        <th>Role</th>
                        {{-- <th>Jumlah Transaksi</th> --}}
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 0; $i < 25; $i++)
                        <tr>
                            <th>{{ $i + 1 }}</th>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <img src="{{ asset('dist/images/profile/user-1.jpg') }}" class="rounded object-fit-cover" width="40" height="40" alt="">
                                    <div>
                                        <div class="fw-bolder">Pengguna {{ $i + 1 }}</div>
                                        <div class="text-truncate" style="max-width: 400px;">user@gmail.com</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                08881234567{{ $i }}
                            </td>
                            <td>
                                @if($i % 5 == 0)
                                <span class="badge bg-secondary text-white">Admin</span>
                                @else
                                <span class="badge bg-warning text-white">User</span>
                                @endif
                            </td>
                            {{-- <td><span class="badge bg-light-primary text-primary">100</span></td> --}}
                            <td>
                                <div class="d-flex align-items-center gap-1">
                                    {{-- <a href="#" class="btn btn-primary p-2"><div class="ti ti-eye"></div></a> --}}
                                    <button type="button" class="btn btn-warning p-2" data-bs-toggle="modal" data-bs-target="#modal-edit-user"><div class="ti ti-edit"></div></button>
                                    <button type="button" class="btn btn-danger p-2 btn-delete-user"><div class="ti ti-trash"></div></button>
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
            $('#table-categories').DataTable(
                {
                    dom: "<'row mt-2 justify-content-between align-items-center'<'col-md-auto custom-container-left'><'col-md-auto ms-auto custom-container-right'>><'row mt-2 justify-content-between'<'col-md-auto me-auto'l><'col-md-auto me-start'f>><'row mt-2 justify-content-md-center'<'col-12'rt>><'row mt-2 justify-content-between align-items-center'<'col-md-auto me-auto'i><'col-md-auto ms-auto'p>>",
                    initComplete: function() {
                        $('.custom-container-right').html(`
                            <div>
                                <label for="filter-role">Role:</label>
                                <select id="filter-role" class="form-select form-select-sm d-inline-block w-auto ms-1">
                                    <option value="">Semua Role</option>
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                </select>
                            </div>
                        `);
                    }
                },
            );

            $(document).on('click', '.btn-delete-user', function() {
                Swal.fire({
                    icon: 'question',
                    title: 'Apakah anda yakin?',
                    text: 'Data pengguna akan dihapus!',
                    showCancelButton: true,
                    cancelButtonText: 'Batal',
                    confirmButtonText: 'Yakin'
                })
            })
        })
    </script>
@endpush