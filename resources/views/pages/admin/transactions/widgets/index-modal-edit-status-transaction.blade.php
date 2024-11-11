<div class="modal fade" id="modal-edit-status-transaction" tabindex="-1">
    <div class="modal-dialog">
        <form action="#" method="POST" class="modal-content">
            <div class="modal-header">
                <h5 class="mb-0 fw-semibold">Ubah Status Transaksi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @csrf
                <div class="mb-3">
                    <label for="status" class="form-label mb-0">Status</label>
                    <select class="form-select" id="status" name="status">
                        <option value="pending">Pending</option>
                        <option value="paid">Dibayar</option>
                        <option value="expired">Transaksi Kedaluwarsa</option>
                        <option value="failed">Transaksi Gagal</option>
                        <option value="shipping">Dikirim</option>
                        <option value="complete">Transaksi Selesai</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-muted" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Ubah</button>
            </div>
        </form>
    </div>
</div>