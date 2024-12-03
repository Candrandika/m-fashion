<!--  Header Start -->
<header class="app-header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link sidebartoggler nav-icon-hover ms-n3" id="headerCollapse"
                    href="javascript:void(0)">
                    <i class="ti ti-menu-2"></i>
                </a>
            </li>
        </ul>
        <div class="d-block d-lg-none">
            <img src="{{ asset('dist/logos/full-dark.png') }}" class="dark-logo" width="180" alt="" />
            <img src="{{ asset('dist/logos/full-dark.png') }}" class="light-logo" width="180" alt="" />
        </div>
        <div class="ms-0 ms-lg-auto justify-content-end" id="navbarNav">
            <div class="d-flex align-items-center justify-content-between">
                <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
                    <li class="nav-item dropdown">
                        <a class="nav-link pe-0" href="javascript:void(0)" id="drop1"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="d-flex align-items-center">
                                <div class="user-profile-img">
                                    <img src="{{ asset('dist/images/profile/user-1.jpg') }}"
                                        class="rounded-circle" width="35" height="35"
                                        alt="" />
                                </div>
                            </div>
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
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<!--  Header End -->