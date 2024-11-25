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
            $('#table-categories').DataTable({
                ajax: "{{ route('data-table.brand') }}",
                columns: [
                    { data: 'id', render: function(data, type, row, meta) {
                        return meta.row + 1;
                    } },
                    { data: 'name', name: 'name', render: function(data, type, row) {
                        return `<div class="d-flex align-items-center gap-3"><img src="{{ asset('storage/` + row.image + `') }}" class="rounded object-fit-cover" width="40" height="40" alt=""><div class="fw-bolder">` + data + `</div></div>`;
                    } },
                    { data: 'products_count', name: 'products_count', defaultContent: '0', render: function(data, type, row) {
                        return '<span class="badge bg-light-primary text-primary">' + row.products_count + '</span>';
                    } },    
                    { data: 'actions', name: 'actions', orderable: false, searchable: false, render: function(data, type, row){
                        return `<div class="d-flex align-items-center gap-1"><button type="button" class="btn btn-warning p-2 btn-edit" data-bs-toggle="modal" data-bs-target="#modal-edit-brand" data-data='`+ JSON.stringify(row) +`'><div class="ti ti-edit"></div></button><button type="button" class="btn btn-danger p-2 btn-delete-brand" data-data='`+ JSON.stringify(row) +`'><div class="ti ti-trash"></div></button></div>`;
                    } },
                ],
                order: [[0, 'asc']],
                columnDefs: [
                    {
                        targets: 0,
                        orderable: false,
                        searchable: false,
                    },
                    {
                        targets: 1,
                        orderable: false,
                        searchable: false,
                    },
                    {
                        targets: 2,
                        orderable: false,
                        searchable: false,
                    },
                    {
                        targets: 3,
                        orderable: false,
                        searchable: false,
                    },
                ],
            });
        })
    </script>
@endpush