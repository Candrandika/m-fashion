<div class="modal fade" id="modal-create-variant" tabindex="-1">
    <div class="modal-dialog">
        <form action="#" method="POST" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Ukuran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
            </div>
            <div class="modal-body">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label mb-0">Nama Ukuran <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nama Ukuran (S, M, L, XL, dll)" required>
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
                            <label for="length" class="form-label mb-0">Lebar <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="length" name="length" placeholder="Lebar" required>
                                <div class="input-group-text">cm</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="tinggi" class="form-label mb-0">Tinggi <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="tinggi" name="tinggi" placeholder="Tinggi" required>
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