<div class="modal fade" id="modal-add-image" tabindex="-1">
    <div class="modal-dialog">
        <form action="{{ route('admin.product-details.store') }}" method="POST" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title">Tambah Gambar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
            </div>
            <div class="modal-body">
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <div class="mb-3">
                    <label for="size" class="form-label mb-0">Gambar <span class="text-danger">*</span></label>
                    <input type="file" multiple class="form-control" id="size" name="size" placeholder="Nama Ukuran (S, M, L, XL, dll)" required>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-muted" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>
    </div>
</div>