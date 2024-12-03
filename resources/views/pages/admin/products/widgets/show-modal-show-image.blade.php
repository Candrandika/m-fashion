<div class="modal modal-lg fade" id="modal-show-image" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Gambar Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <img src="" alt="Gambar Produk" style="min-height: 100px; width: 100%">
                </div>
            </div>
            <div class="modal-footer">
                <form action="" method="POST" id="form-delete-img">
                    @csrf
                    @method('DELETE')
                </form>
                <button type="button" class="btn btn-danger btn-delete" data-id="">Hapus</button>
                <button type="button" class="btn btn-muted" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

@push('script')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.btn-show-image', function() {
                let src = $(this).attr('src');
                let data = $(this).data('img')

                $('#modal-show-image .btn-delete').attr('data-id', data.id)
                $('#modal-show-image img').attr('src', src);
                $('#modal-show-image').modal('show');
            });

            $(document).on('click', '#modal-show-image .btn-delete', function() {
                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Data akan dihapus!",
                    icon: 'question',
                    showCancelButton: true,
                    cancelButtonText: 'Batal',
                    confirmButtonText: 'Yakin'
                }).then((result) => {
                    if (result.isConfirmed) {
                        var id = $(this).data('id');
                        console.log(id)
                        $('#form-delete-img').attr('action', `{{ route('admin.product_images.destroy', ':id') }}`.replace(':id', id));
                        $('#form-delete-img').submit();
                    }
                })
            })
        })
    </script>
@endpush
