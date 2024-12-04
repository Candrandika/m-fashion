<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="m-0 fw-semibold" >Data Ukuran</h4>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-create-size">+ Tambah Ukuran</button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped align-middle" id="table-size"></table>
        </div>
    </div>
</div>

<form action="" id="delete-size-form" method="POST">
    @csrf
    @method('DELETE')
</form>

@push('script')
    <script>
        $(document).ready(function() {
            $('#table-size').DataTable({
                ajax: "{{ route('data-table.size', ['product_id' =>$product->id]) }}",
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
                        data: 'size',
                        title: 'Ukuran',
                    },
                    {
                        title: 'Dimensi (l &times; t)',
                        mRender: function(data, type, row) {
                            return row.width + 'cm &times ' + row.height + 'cm'
                        }
                    },
                    {
                        title: 'Aksi',
                        orderable: false,
                        searchable: false,
                        mRender: function(data, type, row) {
                            return `
                                <td>
                                    <button type="button" class="btn btn-warning p-2 btn-edit-size" data-bs-toggle="modal" data-bs-target="#modal-edit-size" data-data='${JSON.stringify(row)}'><div class="ti ti-edit"></div></button>
                                    <button type="button" class="btn btn-danger p-2 btn-delete-size" data-data='${JSON.stringify(row)}'><div class="ti ti-trash"></div></button>
                                </td>
                            `
                        }
                    }
                ]
            });

            $(document).on('click', '.btn-delete-size', function() {
                const data = $(this).data('data')
                const action = `{{ route('admin.sizes.destroy', ':id') }}`.replace(':id', data.id)
                $('#delete-size-form').attr('action', action)
                
                Swal.fire({
                    icon: 'question',
                    title: 'Apakah anda yakin?',
                    text: 'Data ukuran akan dihapus dari produk ini!',
                    showCancelButton: true,
                    cancelButtonText: 'Batal',
                    confirmButtonText: 'Yakin'
                }).then((result) => {
                    if(result.isConfirmed) {
                        $('#delete-size-form').submit()
                    }
                })

            })
        })
    </script>
@endpush