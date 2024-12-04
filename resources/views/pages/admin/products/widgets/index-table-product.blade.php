<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped align-middle" id="table-products"></table>
        </div>
    </div>
</div>

@push('script')
    <script>
        $(document).ready(function() {
            $('#table-products').DataTable({
                ajax: "{{ route('data-table.product') }}",
                serverSide: true,
                columns: [
                    { 
                        data: 'DT_RowIndex',
                        title: "No",
                        searchable: false,
                        orderable: false
                    },
                    { 
                        data: 'name',
                        title: 'Produk', 
                        render: function(data, type, row) {
                            return `<div class="d-flex align-items-center gap-2"><img src="{{ asset('storage/` + row.image + `') }}" alt="gambar katerogi" width="50px" height="50px" class="rounded object-fit-cover"><div class=""><div class="fw-bolder">` + data + `</div><span class="badge bg-light-primary text-primary">${row?.brand?.name}</span> <span class="badge bg-light-primary text-success">${row?.category?.name}</span></div></div>`;
                        } 
                    },
                    {
                        data: 'price',
                        title: 'Harga',
                        render: function(data, type, row) {
                            const formatter = new Intl.NumberFormat('id-ID', {
                                currency: 'IDR',
                                style: 'currency',
                                maximumFractionDigits: 0
                            })

                            return formatter.format(data)
                        }
                    },
                    { 
                        data: 'products_count',
                        title: 'Stok',
                        defaultContent: '0',
                        render: function(data, type, row) {
                            const total_stock = row.details.reduce((a,item) => a + item.stock, 0);
                        
                            return '<span class="badge bg-light-primary text-primary">' + total_stock + '</span>';
                        }
                    },
                    { 
                        data: 'products_count',
                        title: 'Terjual',
                        defaultContent: '0',
                        render: function(data, type, row) {
                            const total_sold = row.details.reduce((a,item) => a + item.sold, 0);
                            return '<span class="badge bg-light-primary text-primary">' + total_sold + '</span>';
                        }
                    },    
                    { 
                        title: 'Aksi',
                        orderable: false, 
                        searchable: false,
                        mRender: function(data, type, row){
                        const editRoute = "{{ route('admin.products.edit', ':id') }}".replace(':id', row.id);
                        const detailRoute = "{{ route('admin.products.show', ':id') }}".replace(':id', row.id);
                        return `<div class="d-flex align-items-center gap-1"><a href="${detailRoute}" class="btn btn-primary p-2"><div class="ti ti-eye"></div></a><a href="${editRoute}" class="btn btn-warning p-2"><div class="ti ti-edit"></div></a><button type="button" class="btn btn-danger p-2 btn-delete-product" data-data='`+ JSON.stringify(row) +`'><div class="ti ti-trash"></div></button></div>`;
                    } },
                ],
            });
        })
    </script>
@endpush