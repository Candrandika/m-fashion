<header class="d-flex flex-column flex-lg-row justify-content-between align-items-center bg-white px-5 py-3 gap-3">
    <a href="/">
        <img src="{{ asset('dist/logos/full-dark.png') }}" alt="logo" height="30">
    </a>
    <div>
        <form action="/products" class="input-group" style="gap: 1px;">
            <button class="input-group-text bg-muted border-0" style="--bs-bg-opacity: .1">
                <i class="ti ti-search text-black fw-semibold"></i>
            </button>
            <input type="text" name="search" class="form-control bg-muted border-0"
                style="--bs-bg-opacity: .1; width: 300px;" placeholder="Cari di MFashion">
        </form>
    </div>
    <div class="d-flex align-items-center" style="gap: 2.5rem">
        <a href="/carts" class="text-black d-flex flex-column align-items-center justify-content-center">
            <img src="{{ asset('dist/images/icons/bag.png') }}" alt="" width="30">
            {{-- <i class="ti ti-shopping-bag fs-8"></i> --}}
            <div class="fs-1 fw-bolder">Keranjang</div>
        </a>
        <a href="/favorites" class="text-black d-flex flex-column align-items-center justify-content-center">
            {{-- <i class="ti ti-heart fs-8"></i> --}}
            <img src="{{ asset('dist/images/icons/heart.png') }}" alt="" width="30">
            <div class="fs-1 fw-bolder">Favorit</div>
        </a>
        @if (Auth::check())
            <div class="dropdown">
                <a href="javascript:void(0)"
                    class="text-black d-flex flex-column align-items-center justify-content-center" id="drop1"
                    data-bs-toggle="dropdown">
                    {{-- <i class="ti ti-user fs-8"></i> --}}
                    <img src="{{ asset('dist/images/icons/user.png') }}" alt="" width="30">
                    <div class="fs-1 fw-bolder">Profil</div>
                </a>
                <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up"
                    aria-labelledby="drop1">
                    <div class="profile-dropdown position-relative" data-simplebar>
                        <div class="py-3 px-7 pb-0">
                            <h5 class="mb-0 fs-5 fw-semibold">Profil Pengguna</h5>
                        </div>
                        <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                            <img src="{{ asset('dist/images/profile/user-1.jpg') }}" class="rounded-circle"
                                width="80" height="80" alt="" />
                            <div class="ms-3">
                                <h5 class="mb-1 fs-3">{{ Auth::user()->name }}</h5>
                                <span
                                    class="mb-1 d-block text-dark">{{ Auth::user()->roles->pluck('name')->implode(', ') }}</span>
                                <p class="mb-0 d-flex text-dark align-items-center gap-2">
                                    <i class="ti ti-mail fs-4"></i> {{ Auth::user()->email }}
                                </p>
                            </div>
                        </div>
                        <div class="message-body">
                            <a href="{{ route('transaction-history') }}"
                                class="py-8 px-7 mt-8 d-flex align-items-center">
                                <span
                                    class="d-flex align-items-center justify-content-center text-bg-light rounded-1 p-6">
                                    <i class="ti ti-shopping-cart"></i>
                                </span>
                                <div class="w-100 ps-3">
                                    <h6 class="mb-1 fs-3 fw-semibold lh-base">Transaksi</h6>
                                    <span class="fs-2 d-block text-body-secondary">Riwayat Transaksi</span>
                                </div>
                            </a>
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
            <div class="dropdown">
                <a href="javascript:void(0)"
                    class="text-black d-flex flex-column align-items-center justify-content-center" id="drop1"
                    data-bs-toggle="dropdown">
                    {{-- <i class="ti ti-user fs-8"></i> --}}
                    <img src="{{ asset('dist/images/icons/user.png') }}" alt="" width="30">
                    <div class="fs-1 fw-bolder">Profil</div>
                </a>
                <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up"
                    aria-labelledby="drop1">
                    <div class="profile-dropdown position-relative" data-simplebar>
                        <div class="py-3 px-7 pb-0">
                            <h5 class="mb-0 fs-5 fw-semibold" style="text-wrap: nowrap;">Keanggotaan MFashion</h5>
                        </div>
                        <div class="d-grid py-4 px-7 pt-8">
                            <a href="/login" class="btn btn-dark w-100">Masuk</a>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <a href="#" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom"
            aria-controls="offcanvasBottom" class="text-black">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                stroke-linejoin="round">
                <path d="M4 8l16 0" />
                <path d="M4 16l16 0" />
            </svg>

        </a>
    </div>
</header>
