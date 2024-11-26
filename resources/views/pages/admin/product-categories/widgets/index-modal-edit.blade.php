<div class="modal fade" id="modal-edit-category" tabindex="-1">
    <div class="modal-dialog">
        <form action="#" method="POST" class="modal-content" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="modal-header">
                <h5 class="modal-title">Ubah Kategori</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
            </div>
            <div class="modal-body">
                @csrf
                <div class="mb-3">
                    <label for="image" class="form-label mb-0">Gambar</label>
                    <input type="file" class="form-control" id="image" name="image" accept=".jpg,.png,.jpeg">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label mb-0">Nama Kategori <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nama Kategori" required>
                </div>
                <div class="mb-3">
                    <label for="desc" class="form-label mb-0">Deskripsi</label>
                    <textarea class="form-control" id="desc" name="desc" placeholder="Deskripsi"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-muted" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Ubah</button>
            </div>
        </form>
    </div>
</div>