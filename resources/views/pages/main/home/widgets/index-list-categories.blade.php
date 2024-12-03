<h4 class="fw-bolder mb-4">Kategori Produk</h4>
<div class="row">
    @forelse ($categories as $category)
        <div class="col-lg-4 mb-3">
            <div class="position-relative">
                <img src="{{ asset('storage/' . $category->image) }}" alt="" class="w-100 rounded-2" style="aspect-ratio: 1/1; object-fit: cover;">
                <a href="/categories/{{ $category->id }}"
                    class="btn btn-light d-flex align-items-center justify-content-between fw-semibold rounded-1 position-absolute translate-middle start-50"
                    style="bottom: 0; width: 90%">
                    <div>{{ $category->name }}</div>
                    <i class="ti ti-arrow-right"></i>
                </a>
            </div>
        </div>
    @empty
        <div class="col-lg-4 mb-3">
            <div class="bg-muted p-5 rounded text-white">
                <div class="text-center">Belum ada kategori</div>
            </div>
        </div>
    @endforelse
</div>
