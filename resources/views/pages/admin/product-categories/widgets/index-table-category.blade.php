<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped align-middle" id="table-categories"></table>
        </div>
    </div>
</div>

@push('script')
    <script>
        $(document).ready(function() {
            $('#table-categories').DataTable({
                ajax: "{{ route('data-table.category') }}",
                serverSide: true,
                columns: [
                    { 
                        data: 'DT_RowIndex',
                        orderable: false,
                        searchable: false,
                        title: 'No'
                    },
                    { 
                        data: 'name', 
                        title: 'Kategori', 
                        render: function(data, type, row) {
                            const desc = row.desc != null ? row.desc : '-';
                            return `<div class="d-flex align-items-center gap-2"><img src="{{ asset('storage/` + row.image + `') }}" alt="gambar katerogi" width="50px" height="50px" class="rounded object-fit-cover"><div class=""><div class="fw-bolder">` + data + `</div><div class="text-truncate" style="max-width: 400px;">` + desc + `</div></div></div>`;
                        }
                    },
                    { 
                        data: 'products_count', 
                        title: 'Jumlah Produk',
                        defaultContent: '0', 
                        render: function(data, type, row) {
                            return '<span class="badge bg-light-primary text-primary">' + row.products_count + '</span>';
                        }
                    },
                    { 
                        data: 'actions',
                        title: 'Aksi', 
                        orderable: false,
                        searchable: false, 
                        render: function(data, type, row){
                            return `<div class="d-flex align-items-center gap-1"><button type="button" class="btn btn-primary p-2 btn-detail-category" data-bs-toggle="modal" data-bs-target="#modal-detail-category" data-data='`+ JSON.stringify(row) +`'><div class="ti ti-eye"></div></button><button type="button" class="btn btn-warning p-2 btn-edit" data-bs-toggle="modal" data-bs-target="#modal-edit-category" data-data='`+ JSON.stringify(row) +`'><div class="ti ti-edit"></div></button><button type="button" class="btn btn-danger p-2 btn-delete-category" data-data='`+ JSON.stringify(row) +`'><div class="ti ti-trash"></div></button></div>`;
                        }
                    },
                ],
                order: [[1, 'asc']],
            });
        })
    </script>
@endpush