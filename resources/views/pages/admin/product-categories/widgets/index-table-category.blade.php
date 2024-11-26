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
                    @for ($i = 0; $i < 1; $i++)
                        <tr>
                            <th>{{ $i + 1 }}</th>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <img src="{{ asset('dist/images/profile/user-1.jpg') }}" alt="gambar katerogi" width="50px" class="rounded">
                                    <div class="">
                                        <div class="fw-bolder">Kategori {{ $i + 1 }}</div>
                                        <div class="text-truncate" style="max-width: 400px;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis perspiciatis fuga eos.</div>
                                    </div>
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
            $('#table-categories').DataTable({
                ajax: "{{ route('data-table.category') }}",
                columns: [
                    { data: 'id', render: function(data, type, row, meta) {
                        return meta.row + 1;
                    } },
                    { data: 'name', name: 'name', render: function(data, type, row) {
                        const desc = row.desc != null ? row.desc : '-';
                        return `<div class="d-flex align-items-center gap-2"><img src="{{ asset('storage/` + row.image + `') }}" alt="gambar katerogi" width="50px" class="rounded"><div class=""><div class="fw-bolder">` + data + `</div><div class="text-truncate" style="max-width: 400px;">` + desc + `</div></div></div>`;
                    } },
                    { data: 'products_count', name: 'products_count', defaultContent: '0', render: function(data, type, row) {
                        return '<span class="badge bg-light-primary text-primary">' + row.products_count + '</span>';
                    } },    
                    { data: 'actions', name: 'actions', orderable: false, searchable: false, render: function(data, type, row){
                        return `<div class="d-flex align-items-center gap-1"><button type="button" class="btn btn-primary p-2" data-bs-toggle="modal" data-bs-target="#modal-detail-category" data-data='`+ JSON.stringify(row) +`'><div class="ti ti-eye"></div></button><button type="button" class="btn btn-warning p-2 btn-edit" data-bs-toggle="modal" data-bs-target="#modal-edit-category" data-data='`+ JSON.stringify(row) +`'><div class="ti ti-edit"></div></button><button type="button" class="btn btn-danger p-2 btn-delete-category" data-data='`+ JSON.stringify(row) +`'><div class="ti ti-trash"></div></button></div>`;
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