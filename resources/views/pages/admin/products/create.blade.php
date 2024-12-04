@extends('layouts.admin.index')


@section('subtitle', 'Tambah Produk')

@section('content')
    @include('components.alerts.index')
    <div class="mb-3">
        <h3>Tambah Produk</h3>
    </div>
    <form action="{{ route('admin.products.store') }}" method="POST" class="card" enctype="multipart/form-data"
        id="form-create-product">
        <div class="card-body">
            @csrf
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="name" class="form-label mb-0">Nama Produk <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nama Produk" value="{{ old('name') }}"
                            required>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="image" class="form-label mb-0">Gambar <span class="text-danger">*</span></label>
                        <input type="file" class="form-control" id="image" name="image" accept=".jpg,.png,.jpeg"
                            required>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                        <label for="price" class="form-label mb-0">Harga <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-text">Rp</div>
                            <input type="number" class="form-control" id="price" name="price"
                                placeholder="Harga Produk" value="{{ old('price') }}" required>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="brand_id" class="form-label mb-0">Brand <span class="text-danger">*</span></label>
                        <select class="form-select" id="brand_id" name="brand_id" required>
                            <option value="">Pilih Brand</option>
                            @foreach ($brand as $item)
                                <option value="{{ $item->id }}"  @if(old('brand_id') == $item->id) selected @endif> {{ $item->name }}</option>
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
                                <option value="{{ $item->id }}"  @if(old('category_id') == $item->id) selected @endif> {{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                        <label for="desc" class="form-label mb-0">Deskripsi & Fit <span
                                class="text-danger">*</span></label>
                        <div id="editor" style="height: 200px"></div>
                        <input type="hidden" name="desc">
                    </div>
                    <div class="mb-3">
                        <label for="supplier" class="form-label mb-0">Pemasok Bahan <span
                                class="text-danger">*</span></label>
                        <div id="editor-supplier" style="height: 100px"></div>
                        <input type="hidden" name="supplier">
                    </div>
                    <div class="mb-3">
                        <label for="shipping_return" class="form-label mb-0">Pengiriman dan Pengembalian <span
                                class="text-danger">*</span></label>
                        <div id="editor-shipping-return" style="height: 200px"></div>
                        <input type="hidden" name="shipping_return">
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer justify-content-end d-flex gap-2">
            <a href="/admin/products" class="btn btn-muted">Kembali</a>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
    </form>
@endsection


@push('script')
    <script src="{{ asset('dist/libs/quill/dist/quill.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            var quill_create = new Quill("#form-create-product #editor", {
                theme: "snow",
            });
            var quill_create_supplier = new Quill("#form-create-product #editor-supplier", {
                theme: "snow",
            });
            var quill_create_shipping_return = new Quill("#form-create-product #editor-shipping-return", {
                theme: "snow",
            });

            quill_create.clipboard.dangerouslyPasteHTML(`{!! old('desc') !!}`);
            quill_create_supplier.clipboard.dangerouslyPasteHTML(`{!! old('supplier') !!}`);
            quill_create_shipping_return.clipboard.dangerouslyPasteHTML(`{!! old('shipping_return') !!}`);

            $(document).on('submit', '#form-create-product', function(e) {

                const quill_content = quill_create.root.innerHTML;
                $('#form-create-product [name=desc]').val(quill_content)

                const quill_content_supplier = quill_create_supplier.root.innerHTML;
                $('#form-create-product [name=supplier]').val(quill_content_supplier)

                const quill_content_shipping_return = quill_create_shipping_return.root.innerHTML;
                $('#form-create-product [name=shipping_return]').val(quill_content_shipping_return)
            })
        })
    </script>
@endpush

@push('style')
    <link rel="stylesheet" href="{{ asset('dist/libs/quill/dist/quill.snow.css') }}">
@endpush
