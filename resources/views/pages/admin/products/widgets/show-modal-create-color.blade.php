<div class="modal fade" id="modal-create-color" tabindex="-1">
    <div class="modal-dialog">
        <form action="{{ route('admin.colors.store') }}" method="POST" class="modal-content" enctype="multipart/form-data">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Warna</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
            </div>
            <div class="modal-body">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <div class="mb-3">
                    <label for="color" class="form-label mb-0">Warna <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="color" name="color" placeholder="Warna" required>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label mb-0">Gambar <span class="text-danger">*</span></label>
                    <input type="file" class="form-control" id="image" name="image" accept=".jpg,.png,.jpeg" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-muted" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>
    </div>
</div>