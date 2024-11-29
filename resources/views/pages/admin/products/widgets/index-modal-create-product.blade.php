<div class="modal modal-lg fade" id="modal-create-product" tabindex="-1">
    <div class="modal-dialog">
        <form action="{{ route('admin.products.store') }}" method="POST" class="modal-content" enctype="multipart/form-data">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
            </div>
            <div class="modal-body">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="image" class="form-label mb-0">Gambar <span class="text-danger">*</span></label>
                            <input type="file" class="form-control" id="image" name="image" accept=".jpg,.png,.jpeg" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="name" class="form-label mb-0">Nama Produk <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nama Produk" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="brand_id" class="form-label mb-0">Brand <span class="text-danger">*</span></label>
                            <select class="form-select" id="brand_id" name="brand_id" required>
                                <option value="">Pilih Brand</option>
                                @foreach ($brand as $item)
                                    <option value="{{ $item->id }}"> {{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="category_id" class="form-label mb-0">Kategori <span class="text-danger">*</span></label>
                            <select class="form-select" id="category_id" name="category_id" required>
                                <option value="">Pilih Kategori</option>
                                @foreach ($category as $item)
                                    <option value="{{ $item->id }}"> {{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="desc" class="form-label mb-0">Deskripsi <span class="text-danger">*</span></label>
                            <div id="editor" style="height: 300px"></div>
                            <input type="hidden" name="desc">
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

@push('script')
    <script>
        $(document).ready(function() {
            var quill_create = new Quill("#modal-create-product #editor", {
                theme: "snow",
            });
    
            $(document).on('submit', '#modal-create-product form', function() {
                const quill_content = quill_create.root.innerHTML;
                $('#modal-create-product [name=desc]').val(quill_content)
            })
        })
    </script>
@endpush