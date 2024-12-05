<div class="modal fade" id="modal-edit-discount" tabindex="-1">
    <div class="modal-dialog">
        <form action="" method="POST" enctype="multipart/form-data" class="modal-content">
            @csrf
            @method('PUT')
            <div class="modal-header">
                <h5 class="modal-title">Ubah Diskon</h5>
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
                    <div class="mb-3">
                        <label for="image">Gambar / Banner</label>
                        <input type="file" class="form-control" id="image" name="image" accept=".jpg,.jpeg,.png">
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
                        <div class="mb-3">
                            <label for="product_id">Maks. Penggunaan</label>
                            <input type="number" name="max_used" id="max_used" class="form-control" min="0" placeholder="Maks. Penggunaan">
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
                <button type="submit" class="btn btn-primary">Ubah</button>
            </div>
        </form>
    </div>
</div>

@push('script')
    <script>
        $(document).ready(function() {
            showHideByTypeEdit()

            $(document).on('click', '.btn-edit', function() {
                const data_discount = $(this).data('discount')
                
                const edit_url = '{{ route('admin.discounts.update', ':id') }}'.replace(':id', data_discount.id)

                $('#modal-edit-discount form').attr('action', edit_url)

                $('#modal-edit-discount [name=desc]').val(data_discount.desc)
                $('#modal-edit-discount [name=product_id]').val(data_discount.product_id)
                $('#modal-edit-discount [name=max_used]').val(data_discount.max_used)
                $('#modal-edit-discount [name=discount_type]').each(function() {
                    if ($(this).val() == data_discount.discount_type) $(this).prop('checked', true)
                    else $(this).prop('checked', false)
                })
                $('#modal-edit-discount [name=discount\\[percentage\\]]').val(data_discount.percentage)
                $('#modal-edit-discount [name=discount\\[price\\]]').val(data_discount.price)
                $('#modal-edit-discount [name=start_at]').val(data_discount.start_at)
                $('#modal-edit-discount [name=end_at]').val(data_discount.end_at)

                showHideByTypeEdit()
            })

            function showHideByTypeEdit() {
                const type = $('#modal-edit-discount [name=discount_type]:checked').val()
                if (type == 'percentage') {
                    $('#modal-edit-discount #percentage-view').show()
                    $('#modal-edit-discount #price-view').hide()
                } else if(type == 'price') {
                    $('#modal-edit-discount #percentage-view').hide()
                    $('#modal-edit-discount #price-view').show()
                } else {
                    $('#modal-edit-discount #percentage-view').hide()
                    $('#modal-edit-discount #price-view').hide()
                }
            }

            $(document).on('click input change', '#modal-edit-discount [name=discount_type]', function() {
                showHideByTypeEdit()
            })
        })
    </script>
@endpush