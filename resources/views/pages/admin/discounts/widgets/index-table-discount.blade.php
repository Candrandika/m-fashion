<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped align-middle" id="table-discounts"></table>
        </div>
    </div>
</div>

<form action="" method="POST" id="form-delete">
    @csrf
    @method('DELETE')
</form>

@push('script')
    <script>
        $(document).ready(function() {
            $('#table-discounts').DataTable({
                ajax: "{{ route('data-table.discount') }}",
                serverSide: true,
                columns: [{
                        data: 'DT_RowIndex',
                        title: "No",
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'desc',
                        title: 'Nama Diskon',
                        render: function(data, type, row) {
                            return `<div class="d-flex align-items-center gap-2"><div class=""><div class="fw-bolder">` +
                                data + `</div></div>`;
                        }
                    },
                    {
                        data: 'price',
                        title: 'Diskon',
                        render: function(data, type, row) {
                            if (row.discount_type == "price") {
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
                        render: function(data, type, row) {
                            return moment(data).locale('id').format('DD MMM YYYY HH:mm')
                        }
                    },
                    {
                        data: 'end_at',
                        title: 'Tanggal Berakhir',
                        render: function(data, type, row) {
                            return moment(data).locale('id').format('DD MMM YYYY HH:mm')
                        }
                    },
                    {
                        title: 'Aksi',
                        orderable: false,
                        searchable: false,
                        mRender: function(data, type, row) {
                            const delete_url = "{{ route('admin.discounts.destroy', ':id') }}"
                                .replace(':id', row.id)
                            let photo_button = ""
                            if(row.image) {
                                const img_url = "{{ asset('storage') }}" + '/' + row.image
                                photo_button = `<button type="button" data-bs-toggle="modal" data-bs-target="#modal-show-image" data-image="${img_url}" class="btn btn-primary btn-show-image px-2 py-1"><i class="ti ti-photo"></i></button>`
                            }

                            return `<div class="d-flex align-items-center gap-1">${photo_button}<button type="button" data-discount='${JSON.stringify(row)}' data-bs-toggle="modal" data-bs-target="#modal-edit-discount" class="btn btn-warning p-2 btn-edit"><div class="ti ti-edit"></div></button><button type="button" class="btn btn-danger p-2 btn-delete-discount" data-url="${delete_url}"><div class="ti ti-trash"></div></button></div>`;
                        }
                    },
                ],
            });

            $(document).on('click', '.btn-delete-discount', function() {
                const url = $(this).data('url')
                $('#form-delete').attr('action', url)

                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Data diskon akan dihapus!",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#form-delete').submit()
                    }
                })
            })
        })
    </script>
@endpush
