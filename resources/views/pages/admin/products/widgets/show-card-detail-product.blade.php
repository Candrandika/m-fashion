<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-4">
                <img src="{{ asset('dist/images/products/product-1.jpg') }}" alt="gambar produk" class="object-fit-cover rounded w-100" style="aspect-ratio: 1/1;">
                <div class="contaier-fluid mt-3">
                    <div class="owl-carousel counter-carousel owl-theme">
                        <div class="item">
                            <img src="{{ asset('dist/images/products/product-1.jpg') }}" alt="gambar produk" class="object-fit-cover rounded w-100" style="aspect-ratio: 1/1;">
                        </div>
                      </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="row justify-content-between">
                    <div class="col-md-8">
                        <h3 class="fw-bolder mb-0 mt-4 mt-lg-0">{{ $product->name }}</h3>
                        <div class="d-flex gap-2 mb-2">
                            <span class="badge bg-light-warning text-warning">{{ $product->brand->name }}</span>
                            <span class="badge bg-light-success text-success">{{ $product->category->name }}</span>
                        </div>
                    </div>
                    <div class="col-md-4 text-end">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-add-image">+ Tambah Gambar</button>
                    </div>
                </div>
                <p class="p-2 border rounded mt-3">
                    {!! $product->desc ?? "-" !!}
                </p>
            </div>
        </div>
    </div>
</div>