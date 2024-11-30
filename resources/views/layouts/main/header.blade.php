<header class="d-flex justify-content-between align-items-center bg-white px-5 py-3">
    <a href="/home">
        <img src="{{ asset('dist/logos/full-dark.png') }}" alt="logo" height="30">
    </a>
    <div>
        <div class="input-group" style="gap: 1px;">
            <div class="input-group-text bg-muted border-0" style="--bs-bg-opacity: .1">
                <i class="ti ti-search text-black fw-semibold"></i>
            </div>
            <input type="text" class="form-control bg-muted border-0" style="--bs-bg-opacity: .1; width: 300px;" placeholder="Cari di MFashion">
        </div>
    </div>
    <div class="d-flex gap-4 align-items-center">
        <a href="/carts" class="text-black d-flex flex-column align-items-center justify-content-center">
            <i class="ti ti-shopping-bag fs-8"></i>
            <div class="fs-1 fw-bolder">Keranjang</div>
        </a>
        <a href="/favorites" class="text-black d-flex flex-column align-items-center justify-content-center">
            <i class="ti ti-heart fs-8"></i>
            <div class="fs-1 fw-bolder">Favorit</div>
        </a>
        <a href="/profile" class="text-black d-flex flex-column align-items-center justify-content-center">
            <i class="ti ti-user fs-8"></i>
            <div class="fs-1 fw-bolder">Profil</div>
        </a>
        <a href="#" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom" class="text-black">
            <i class="ti ti-menu fs-8"></i>
        </a>
    </div>
</header>