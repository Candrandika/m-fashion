<div class="modal fade" id="modal-create-variant" tabindex="-1">
    <div class="modal-dialog">
        <form action="{{ route('admin.product-details.store') }}" method="POST" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Ukuran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
            </div>
            <div class="modal-body">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <div class="mb-3">
                    <label for="size" class="form-label mb-0">Nama Ukuran <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="size" name="size" placeholder="Nama Ukuran (S, M, L, XL, dll)" required>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label mb-0">Harga <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-text">Rp</div>
                        <input type="text" class="form-control" id="price" name="price" placeholder="Harga" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="stock" class="form-label mb-0">Stok <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="stock" name="stock" placeholder="Stok" required>
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
                            <label for="heigth" class="form-label mb-0">Tinggi <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="heigth" name="heigth" placeholder="Tinggi" required>
                                <div class="input-group-text">cm</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-muted" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>
    </div>
</div>