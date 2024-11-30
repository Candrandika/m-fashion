<h4 class="fw-bolder mb-4">Produk Unggulan</h4>
<div class="row">
    @for ($i = 0; $i < 3; $i++)
        <a href="/products/1" class="col-lg-4 mb-3">
            <img src="{{ asset('dist/images/profile/user-1.jpg') }}" alt="" class="w-100 rounded-2">
            <h5 class="fw-semibold m-0">Nama Produk</h5>
            <h6 class="fw-semibold m-0">Rp 100.000</h6>
        </a>
    @endfor
</div>
