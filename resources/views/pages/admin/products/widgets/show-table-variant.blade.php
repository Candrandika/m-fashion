<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="m-0 fw-semibold" >Data Varian</h4>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-create-variant">+ Tambah Varian</button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped align-middle" id="table-variant"></table>
        </div>
    </div>
</div>

<form action="" id="delete-variant-form" method="POST">
    @csrf
    @method('DELETE')
</form>

@push('script')
    <script>
        $(document).ready(function() {
            $('#table-variant').DataTable({
                ajax: "{{ route('data-table.product-detail', ['product_id' =>$product->id]) }}",
                order: [[1, 'asc']],
                serverSide: true,
                columns: [
                    {
                        data: 'DT_RowIndex',
                        title: 'No',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'size.size',
                        title: 'Ukuran',
                    },
                    {
                        data: 'color.color',
                        title: 'Warna',
                    },
                    {
                        data: 'stock',
                        title: 'Stok'
                    },
                    {
                        title: 'Aksi',
                        orderable: false,
                        searchable: false,
                        mRender: function(data, type, row) {
                            return `
                                <td>
                                    <button type="button" class="btn btn-warning p-2 btn-edit-variant" data-bs-toggle="modal" data-bs-target="#modal-edit-variant" data-data='${JSON.stringify(row)}'><div class="ti ti-edit"></div></button>
                                    <button type="button" class="btn btn-danger p-2 btn-delete-variant" data-data='${JSON.stringify(row)}'><div class="ti ti-trash"></div></button>
                                </td>
                            `
                        }
                    }
                ]
            });

            $(document).on('click', '.btn-delete-variant', function() {
                const data = $(this).data('data')
                const action = `{{ route('admin.product-details.destroy', ':id') }}`.replace(':id', data.id)
                $('#delete-variant-form').attr('action', action)
                
                Swal.fire({
                    icon: 'question',
                    title: 'Apakah anda yakin?',
                    text: 'Data varian akan dihapus dari produk ini!',
                    showCancelButton: true,
                    cancelButtonText: 'Batal',
                    confirmButtonText: 'Yakin'
                }).then((result) => {
                    if(result.isConfirmed) {
                        $('#delete-variant-form').submit()
                    }
                })

            })
        })
    </script>
@endpush