<header class="d-flex justify-content-between align-items-center bg-white px-5 py-3">
    <a href="/home">
        <img src="{{ asset('dist/logos/full-dark.png') }}" alt="logo" height="30">
    </a>
    <div>
        <form action="/products" class="input-group" style="gap: 1px;">
            <button class="input-group-text bg-muted border-0" style="--bs-bg-opacity: .1">
                <i class="ti ti-search text-black fw-semibold"></i>
            </button>
            <input type="text" name="search" class="form-control bg-muted border-0" style="--bs-bg-opacity: .1; width: 300px;" placeholder="Cari di MFashion">
        </form>
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
        @if(Auth::check())
        <div class="dropdown">
            <a href="javascript:void(0)" class="text-black d-flex flex-column align-items-center justify-content-center" id="drop1" data-bs-toggle="dropdown">
                <i class="ti ti-user fs-8"></i>
                <div class="fs-1 fw-bolder">Profil</div>
            </a>
            <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up"
                aria-labelledby="drop1">
                <div class="profile-dropdown position-relative" data-simplebar>
                    <div class="py-3 px-7 pb-0">
                        <h5 class="mb-0 fs-5 fw-semibold">Profil Pengguna</h5>
                    </div>
                    <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                        <img src="{{ asset('dist/images/profile/user-1.jpg') }}" class="rounded-circle" width="80" height="80" alt="" />
                        <div class="ms-3">
                            <h5 class="mb-1 fs-3">{{ Auth::user()->name }}</h5>
                            <span class="mb-1 d-block text-dark">{{ Auth::user()->roles->pluck('name')->implode(', ') }}</span>
                            <p class="mb-0 d-flex text-dark align-items-center gap-2">
                                <i class="ti ti-mail fs-4"></i> {{ Auth::user()->email }}
                            </p>
                        </div>
                    </div>
                    <div class="d-grid py-4 px-7 pt-8">
                        <form action="{{ route('mainlogout') }}" method="POST">
                            @csrf
                            <button class="btn btn-outline-dark w-100">Log Out</but>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @else
        <a href="/login" class="text-black d-flex flex-column align-items-center justify-content-center">
            <i class="ti ti-user fs-8"></i>
            <div class="fs-1 fw-bolder">Profil</div>
        </a>
        @endif
        <a href="#" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom" class="text-black">
            <i class="ti ti-menu fs-8"></i>
        </a>
    </div>
</header>