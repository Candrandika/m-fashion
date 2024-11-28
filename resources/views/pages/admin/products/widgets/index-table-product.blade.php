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
                    
                </tbody>
            </table>
        </div>
    </div>
</div>

@push('script')
    <script>
        $(document).ready(function() {
            $('#table-products').DataTable({
                ajax: "{{ route('data-table.product') }}",
                columns: [
                    { data: 'id', render: function(data, type, row, meta) {
                        return meta.row + 1;
                    } },
                    { data: 'name', name: 'name', render: function(data, type, row) {
                        return `<div class="d-flex align-items-center gap-2"><img src="{{ asset('storage/` + row.image + `') }}" alt="gambar katerogi" width="50px" class="rounded"><div class=""><div class="fw-bolder">` + data + `</div><span class="badge bg-light-primary text-primary">${row?.brand?.name}</span> <span class="badge bg-light-primary text-success">${row?.category?.name}</span></div></div>`;
                    } },
                    { data: 'products_count', name: 'products_count', defaultContent: '0', render: function(data, type, row) {
                        const total_stock = row.details.reduce((a,item) => a + item.stock, 0);
                        
                        return '<span class="badge bg-light-primary text-primary">' + total_stock + '</span>';
                    } },
                    { data: 'products_count', name: 'products_count', defaultContent: '0', render: function(data, type, row) {
                        const total_sold = row.details.reduce((a,item) => a + item.sold, 0);
                        return '<span class="badge bg-light-primary text-primary">' + total_sold + '</span>';
                    } },    
                    { data: 'actions', name: 'actions', orderable: false, searchable: false, render: function(data, type, row){
                        const detailRoute = "{{ route('admin.products.show', ':id') }}".replace(':id', row.id);
                        return `<div class="d-flex align-items-center gap-1"><a href="${detailRoute}" class="btn btn-primary p-2"><div class="ti ti-eye"></div></a><button type="button" class="btn btn-warning p-2 btn-edit" data-bs-toggle="modal" data-bs-target="#modal-edit-product" data-data='`+ JSON.stringify(row) +`'><div class="ti ti-edit"></div></button><button type="button" class="btn btn-danger p-2 btn-delete-product" data-data='`+ JSON.stringify(row) +`'><div class="ti ti-trash"></div></button></div>`;
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