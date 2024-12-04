<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="m-0 fw-semibold" >Data Warna</h4>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-create-color">+ Tambah Warna</button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped align-middle" id="table-color"></table>
        </div>
    </div>
</div>

<form action="" id="delete-color-form" method="POST">
    @csrf
    @method('DELETE')
</form>

@push('script')
    <script>
        $(document).ready(function() {
            $('#table-color').DataTable({
                ajax: "{{ route('data-table.color', ['product_id' => $product->id]) }}",
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
                        data: 'color',
                        title: 'Warna',
                    },
                    {
                        title: 'Gambar',
                        mRender: function(data, type, row) {
                            const storage = "{{ asset('storage') }}"
                            return `<img src="${storage+'/'+row['image']}" width="40" height="40" class="object-fit-cover" />`
                        }
                    },
                    {
                        title: 'Aksi',
                        orderable: false,
                        searchable: false,
                        mRender: function(data, type, row) {
                            return `
                                <td>
                                    <button type="button" class="btn btn-warning p-2 btn-edit-color" data-bs-toggle="modal" data-bs-target="#modal-edit-color" data-data='${JSON.stringify(row)}'><div class="ti ti-edit"></div></button>
                                    <button type="button" class="btn btn-danger p-2 btn-delete-color" data-data='${JSON.stringify(row)}'><div class="ti ti-trash"></div></button>
                                </td>
                            `
                        }
                    }
                ]
            });

            $(document).on('click', '.btn-delete-color', function() {
                const data = $(this).data('data')
                const action = `{{ route('admin.colors.destroy', ':id') }}`.replace(':id', data.id)
                $('#delete-color-form').attr('action', action)
                
                Swal.fire({
                    icon: 'question',
                    title: 'Apakah anda yakin?',
                    text: 'Data warna akan dihapus dari produk ini!',
                    showCancelButton: true,
                    cancelButtonText: 'Batal',
                    confirmButtonText: 'Yakin'
                }).then((result) => {
                    if(result.isConfirmed) {
                        $('#delete-color-form').submit()
                    }
                })

            })
        })
    </script>
@endpush