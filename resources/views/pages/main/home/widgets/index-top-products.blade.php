<h4 class="fw-bolder mb-4">Produk Unggulan</h4>
<div class="row">
    @forelse($products as $product)
        <a href="/products/1" class="col-lg-4 mb-3">
            <img src="{{ asset('storage/'.$product->image) }}" alt="" class="w-100 rounded-2">
            <h5 class="fw-semibold m-0">{{ $product->name }}</h5>
            <h6 class="fw-semibold m-0">Rp {{ $product->price }}</h6>
        </a>
    @empty
        <div>-- Tidak ada data --</div>
    @endforelse
</div>
