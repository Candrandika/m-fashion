<div class="d-flex align-item-end justify-content-between">
    <h4 class="fw-bolder mb-4">Produk Unggulan</h4>
    <a href="/products">Produk Lainnya <t class="ti ti-arrow-narrow-right"></t></a>
</div>
<div class="row">
    @forelse($products as $product)
        <a href="/products/{{ $product->id }}" class="col-lg-4 mb-3">
            <img src="{{ asset('storage/'.$product->image) }}" alt="" class="w-100 rounded-2" style="aspect-ratio: 1/1; object-fit: cover;">
            <h5 class="fw-semibold m-0">{{ $product->name }}</h5>
            <h6 class="fw-semibold m-0">Rp {{ number_format($product->price, 0, ',', '.') }}</h6>
        </a>
    @empty
        <div>-- Tidak ada data --</div>
    @endforelse
</div>
