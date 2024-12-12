<div class="modal fade" id="modal-edit-status-transaction" tabindex="-1">
    <div class="modal-dialog">
        <form action="#" method="POST" class="modal-content">
            <div class="modal-header">
                <h5 class="mb-0 fw-semibold">Ubah Status Transaksi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @csrf
                @method("PUT")
                <div class="mb-3">
                    <label for="status" class="form-label mb-0">Status</label>
                    <select class="form-select" id="status" name="status">
                        <option value="PENDING">Pending</option>
                        <option value="PAID">Dibayar</option>
                        <option value="EXPIRED">Transaksi Kedaluwarsa</option>
                        <option value="FAILED">Transaksi Gagal</option>
                        <option value="REJECTED">Transaksi Ditolak</option>
                        <option value="SHIPPING">Dikirim</option>
                        <option value="COMPLETE">Transaksi Selesai</option>
                    </select>
                </div>
                <div id="shipping-form" style="display: none">
                    <div class="form-group mb-3">
                        <label for="shipping_method" class="form-label mb-0">Kurir</label>
                        <input type="text" name="shipping_method" class="form-control" id="shipping_method" placeholder="Kurir">
                    </div>
                    <div class="form-group mb-3">
                        <label for="resi" class="form-label mb-0">No. Resi</label>
                        <input type="text" name="resi" class="form-control" id="resi" placeholder="No. Resi">
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
        function checkShipping() {
            if($('[name=status]').val() == 'SHIPPING') $('#shipping-form').show();
            else $('#shipping-form').hide();
        }
        
        $(document).on('change', '[name=status]', function() {
            checkShipping()
        })

        $(document).on('click', '.btn-edit', function() {
            const data = $(this).data('data')
            $('[name=status]').val(data.status)
            $('[name=shipping_method]').val(data.shipping_method)
            $('[name=resi]').val(data.resi)

            let url = `{{ route("admin.transactions.update", ":id") }}`
            url = url.replace(':id', data.id)

            $('#modal-edit-status-transaction form').attr('action', url)

            checkShipping()
        })
    })
</script>
@endpush