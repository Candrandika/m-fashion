<div class="modal fade" id="modal-create-size" tabindex="-1">
    <div class="modal-dialog">
        <form action="{{ route('admin.sizes.store', $product->id) }}" method="POST" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Ukuran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
            </div>
            <div class="modal-body">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <div class="mb-3">
                    <label for="size" class="form-label mb-0">Ukuran <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="size" name="size" placeholder="Ukuran (S, M, L, XL, dll)" required>
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
                                <input type="number" class="form-control" id="height" name="height" placeholder="Tinggi" required>
                                <div class="input-group-text">cm</div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="chest_circumference" class="form-label mb-0">Lingkar Dada</label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="chest_circumference" name="chest_circumference" placeholder="Lingkar Dada">
                                <div class="input-group-text">cm</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="waist_circumference" class="form-label mb-0">Lingkar Pinggang</label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="waist_circumference" name="waist_circumference" placeholder="Lingkar Pinggang">
                                <div class="input-group-text">cm</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="hip_circumference" class="form-label mb-0">Lingkar Pinggul</label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="hip_circumference" name="hip_circumference" placeholder="Lingkar Pinggul">
                                <div class="input-group-text">cm</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="length" class="form-label mb-0">Panjang Pakaian</label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="length" name="length" placeholder="Panjang Pakaian">
                                <div class="input-group-text">cm</div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-muted" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>
    </div>
</div>