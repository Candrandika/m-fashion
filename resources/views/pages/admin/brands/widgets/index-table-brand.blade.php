<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped align-middle" id="table-categories">
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
                    { 
                        data: 'DT_RowIndex',
                        title: 'No',
                        orderable: false,
                        searchable: false
                    },
                    { 
                        data: 'name',
                        title: 'Nama Brand', 
                        render: function(data, type, row) {
                            return `<div class="d-flex align-items-center gap-3"><img src="{{ asset('storage/` + row.image + `') }}" class="rounded object-fit-cover" width="40" height="40" alt=""><div class="fw-bolder">` + data + `</div></div>`;
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
                        title: 'Aksi', 
                        orderable: false,
                        searchable: false, 
                        mRender: function(data, type, row){
                            return `<div class="d-flex align-items-center gap-1"><button type="button" class="btn btn-warning p-2 btn-edit" data-bs-toggle="modal" data-bs-target="#modal-edit-brand" data-data='`+ JSON.stringify(row) +`'><div class="ti ti-edit"></div></button><button type="button" class="btn btn-danger p-2 btn-delete-brand" data-data='`+ JSON.stringify(row) +`'><div class="ti ti-trash"></div></button></div>`;
                        }
                    },
                ],
                order: [[1, 'asc']],
            });
        })
    </script>
@endpush