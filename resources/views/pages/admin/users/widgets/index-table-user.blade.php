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
                    },
                    ajax: "{{ route('data-table.user') }}",
                    columns: [
                    { data: 'id', render: function(data, type, row, meta) {
                        return meta.row + 1;
                    } },
                    { data: 'name', name: 'name', render: function(data, type, row) {
                        const image = row.image ? "{{ asset("+ row.image +") }}" : "{{ asset('dist/images/profile/user-1.jpg') }}";
                        return `<div class="d-flex align-items-center gap-3">
                                    <img src="${image}" class="rounded object-fit-cover" width="40" height="40" alt="">
                                    <div>
                                        <div class="fw-bolder">${row.name}</div>
                                        <div class="text-truncate" style="max-width: 400px;">${row.email}</div>
                                    </div>
                                </div>`;
                    } },
                    { data: 'phone', name: 'phone', render: function(data, type, row) {
                        return data ?? '-';
                    } },
                    { data: 'roles', name: 'roles', defaultContent: 'admin', render: function(data, type, row) {
                        const role = row.roles.find(() => true)?.name ?? '-';
                        if(role == 'admin') return '<span class="badge bg-light-warning text-warning">' + role + '</span>';
                        else return '<span class="badge bg-light-primary text-primary">' + role + '</span>';
                    } },    
                    { data: 'actions', name: 'actions', orderable: false, searchable: false, render: function(data, type, row){
                        const detailRoute = "{{ route('admin.users.show', ':id') }}".replace(':id', row.id);
                        return `<div class="d-flex align-items-center gap-1"><a href="${detailRoute}" class="btn btn-primary p-2"><div class="ti ti-eye"></div></a><button type="button" class="btn btn-warning p-2 btn-edit" data-bs-toggle="modal" data-bs-target="#modal-edit-user" data-data='`+ JSON.stringify(row) +`'><div class="ti ti-edit"></div></button><button type="button" class="btn btn-danger p-2 btn-delete-user" data-data='`+ JSON.stringify(row) +`'><div class="ti ti-trash"></div></button></div>`;
                    } },
                    ],
            })
        })
    </script>
@endpush