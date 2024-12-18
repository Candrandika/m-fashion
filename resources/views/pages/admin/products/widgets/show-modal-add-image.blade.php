<div class="modal fade" id="modal-add-image" tabindex="-1">
    <div class="modal-dialog">
        <form action="{{ route('admin.product_images', $product->id) }}" method="POST" class="modal-content" enctype="multipart/form-data">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title">Tambah Media (Gambar / Video)</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
            </div>
            <div class="modal-body">
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <div class="mb-3">
                    <label for="image" class="form-label mb-0">Media <span class="text-danger">*</span></label>
                    <input type="file" multiple class="form-control" id="image" name="image" placeholder="Masukan gambar gambar produk" accept=".jpg,.png,.jpeg,video/*" required>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-muted" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>
    </div>
</div>