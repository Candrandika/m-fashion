<div class="modal fade" id="modal-edit-variant" tabindex="-1">
    <div class="modal-dialog">
        <form action="#" method="POST" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ubah Varian</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
            </div>
            <div class="modal-body">
                @csrf
                @method('PUT')
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="size_id" class="form-label mb-0">Ukuran <span class="text-danger">*</span></label>
                            <select name="size_id" id="size_id" class="form-select" required>
                                <option value="">Pilih Ukuran</option>
                                @foreach ($sizes as $size)
                                    <option value="{{ $size->id }}">{{ $size->size }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="warna_id" class="form-label mb-0">Warna <span class="text-danger">*</span></label>
                            <select name="warna_id" id="warna_id" class="form-select" required>
                                @foreach ($colors as $color)
                                    <option value="{{ $color->id }}">{{ $color->color }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="stock" class="form-label mb-0">Stok <span class="text-danger">*</span></label>
                            <input type="number" min="0" class="form-control" id="stock" name="stock" placeholder="Stok" required>
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
            $(document).on('click', '.btn-edit-variant', function() {
                const data = $(this).data('data')
                let action = `{{ route('admin.product-details.update', ':id') }}`.replace(':id', data.id)

                $('#modal-edit-variant [name=warna_id]').val(data.warna_id)
                $('#modal-edit-variant [name=size_id]').val(data.size_id)
                $('#modal-edit-variant [name=stock]').val(data.stock)
                
                $('#modal-edit-variant form').attr('action', action)
            })
        })
    </script>
@endpush