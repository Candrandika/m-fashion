<div class="modal fade" id="modal-edit-size" tabindex="-1">
    <div class="modal-dialog">
        <form action="#" method="POST" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ubah Ukuran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
            </div>
            <div class="modal-body">
                @csrf
                @method('PUT')
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <div class="mb-3">
                    <label for="size" class="form-label mb-0">Ukuran <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="size" name="size" placeholder="Ukuran (S, M, L, XL, dll)" required>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="width" class="form-label mb-0">Lebar <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="width" name="width" placeholder="Lebar" required>
                                <div class="input-group-text">cm</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="height" class="form-label mb-0">Tinggi <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="height" name="height" placeholder="Tinggi" required>
                                <div class="input-group-text">cm</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-muted" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Ubah</button>
            </div>
        </form>
    </div>
</div>

@push('script')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.btn-edit-size', function() {
                const data = $(this).data('data')
                let action = `{{ route('admin.sizes.update', ':id') }}`.replace(':id', data.id)

                $('#modal-edit-size [name=size]').val(data.size)
                $('#modal-edit-size [name=price]').val(data.price)
                $('#modal-edit-size [name=stock]').val(data.stock)
                $('#modal-edit-size [name=width]').val(data.width)
                $('#modal-edit-size [name=height]').val(data.height)
                $('#modal-edit-size form').attr('action', action)
            })
        })
    </script>
@endpush