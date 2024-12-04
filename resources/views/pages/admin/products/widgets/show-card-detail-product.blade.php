<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-4">
                <img src="{{ $product->image ? asset('storage/'.$product->image) :asset('dist/images/products/product-1.jpg') }}" alt="gambar produk" class="shadow-sm object-fit-cover rounded w-100" style="aspect-ratio: 1/1;">
                <div class="contaier-fluid mt-3">
                    <div class="owl-carousel counter-carousel owl-theme">
                        @foreach ($product->product_images as $index => $img)
                        @if($img->type == 'image')
                        <div class="item">
                            <img data-bs-toggle="modal" data-bs-target="#modal-show-image" src="{{ asset('storage/'.$img->image) }}" alt="gambar produk {{ $index }}" class="object-fit-cover rounded w-100 btn-show-image" style="aspect-ratio: 1/1;" data-img="{{ $img }}">
                        </div>
                        @endif
                        @endforeach
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
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-add-image">+ Tambah Media</button>
                    </div>
                </div>
                <div class="mt-3">
                    <h5 class="fw-semibold">Harga</h5>
                    <div class="unstyled">
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                    </div>
                </div>
                <div class="mt-3">
                    <h5 class="fw-semibold">Deskripsi</h5>
                    <div class="p-2 border rounded mt-3 unstyled">
                        {!! $product->desc ?? "-" !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('pages.admin.products.widgets.show-modal-show-image')