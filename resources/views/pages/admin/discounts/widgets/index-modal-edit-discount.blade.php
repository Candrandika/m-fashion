<div class="modal fade" id="modal-edit-discount" tabindex="-1">
    <div class="modal-dialog">
        <form action="" method="POST" enctype="multipart/form-data" class="modal-content">
            @method('PUT')
            <div class="modal-header">
                <h5 class="modal-title">Tambah Diskon</h5>
                <button type="button" class="btn-close" data-bs-close="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="desc">Judul / Deskripsi Diskon <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="desc" name="desc" placeholder="Judul / Deskripsi Diskon" required>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="product_id">Produk</label>
                            <select name="product_id" id="product_id" class="form-select">
                                <option value="">-- pilih produk --</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-1 d-flex gap-3">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="discount_type" value="percentage" id="discount_percentage">
                                <label for="discount_percentage" class="form-check-label">Persentase</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="discount_type" value="price" id="discount_price">
                                <label for="discount_price" class="form-check-label">Harga</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3 input-group" id="percentage-view">
                            <input type="number" min="1" max="100" class="form-control" placeholder="Diskon" name="discount[percentage]">
                            <div class="input-group-text"><i class="ti ti-percentage"></i></div>
                        </div>
                        <div class="mb-3 input-group" id="price-view">
                            <div class="input-group-text">Rp</div>
                            <input type="number" min="1" class="form-control" placeholder="Diskon" name="discount[price]">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="start_at">Tanggal Mulai</label>
                            <input type="datetime-local" class="form-control" id="start_at" name="start_at" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="end_at">Tanggal Selesai</label>
                            <input type="datetime-local" class="form-control" id="end_at" name="end_at" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-muted" data-bs-close="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>
    </div>
</div>

@push('script')
    <script>
        $(document).ready(function() {
            showHideByType()

            function showHideByType() {
                const type = $('#modal-add-discount [name=discount_type]:checked').val()
                if (type == 'percentage') {
                    $('#percentage-view').show()
                    $('#price-view').hide()
                } else if(type == 'price') {
                    $('#percentage-view').hide()
                    $('#price-view').show()
                } else {
                    $('#percentage-view').hide()
                    $('#price-view').hide()
                }
            }

            $(document).on('click input change', '#modal-add-discount [name=discount_type]', function() {
                showHideByType()
            })
        })
    </script>
@endpush