<div class="modal fade" id="modal-edit-user" tabindex="-1">
    <div class="modal-dialog">
        <form action="#" method="POST" class="modal-content">
            @csrf
            @method('PATCH')
            <div class="modal-header">
                <h5 class="modal-title">Ubah Pengguna</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="name" class="form-label mb-0">Nama <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nama" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label mb-0">Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label mb-0">No. Telp</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="No. Telp">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-muted" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Ubah</button>
            </div>
        </form>
    </div>
</div>