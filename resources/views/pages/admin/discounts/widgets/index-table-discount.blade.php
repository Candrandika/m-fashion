<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped align-middle" id="table-discounts"></table>
        </div>
    </div>
</div>

@push('script')
    <script>
        $(document).ready(function() {
            $('#table-discounts').DataTable({
                ajax: "{{ route('data-table.discount') }}",
                columns: [
                    { 
                        data: 'DT_RowIndex',
                        title: "No",
                        searchable: false,
                        orderable: false
                    },
                    { 
                        data: 'desc',
                        title: 'Diskon', 
                        render: function(data, type, row) {
                            const image = row.image ? "{{ asset('+ row.image +') }}" :
                                "{{ asset('dist/images/products/s1.jpg') }}";
                            return `<div class="d-flex align-items-center gap-2"><img src="${image}" alt="gambar katerogi" width="50px" height="50px" class="rounded object-fit-cover"><div class=""><div class="fw-bolder">` + data + `</div></div>`;
                        } 
                    },
                    {
                        data: 'price',
                        title: 'Harga / Persenan',
                        render: function(data, type, row) {
                            if(row.discount_type == "price"){
                                const formatter = new Intl.NumberFormat('id-ID', {
                                    currency: 'IDR',
                                    style: 'currency',
                                    maximumFractionDigits: 0
                                })
    
                                return formatter.format(data)
                            } else {
                                return row.percentage + "%"
                            }
                        }
                    },
                    { 
                        data: 'start_at',
                        title: 'Tanngal Mulai',
                    },
                    { 
                        data: 'end_at',
                        title: 'Tanggal Berakhir',
                    },    
                    { 
                        title: 'Aksi',
                        orderable: false, 
                        searchable: false,
                        mRender: function(data, type, row){
                        const editRoute = "{{ route('admin.products.edit', ':id') }}".replace(':id', row.id);
                        const detailRoute = "{{ route('admin.products.show', ':id') }}".replace(':id', row.id);
                        return `<div class="d-flex align-items-center gap-1"><a href="${editRoute}" class="btn btn-warning p-2"><div class="ti ti-edit"></div></a><button type="button" class="btn btn-danger p-2 btn-delete-product" data-data='`+ JSON.stringify(row) +`'><div class="ti ti-trash"></div></button></div>`;
                    } },
                ],
            });
        })
    </script>
@endpush