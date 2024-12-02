@extends('layouts.main.index')

@section('subtitle', 'Hubungi Kami')

@section('content')
    <div
        style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('dist/images/backgrounds/auth-page-bg.png') }}'); background-position: center; background-size: cover; width: 100%; height: 300px; display: grid; place-content: center;">
        <h1 class="text-white">Hubungi Kami</h1>
    </div>
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-4">
                <a href="#" class="card bg-dark shadow mb-3">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center text-white gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z" />
                            <path d="M3 7l9 6l9 -6" />
                        </svg>
                        <div>
                            <div class="text-center mb-1 fw-semibold">Email</div>
                            <div class="text-center">email@gmail.com</div>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-linecap="round" stroke-linejoin="round" width="36" height="36" stroke-width="1">
                            <path d="M5 12l14 0"></path>
                            <path d="M13 18l6 -6"></path>
                            <path d="M13 6l6 6"></path>
                        </svg>
                    </div>
                </a>
            </div>
            <div class="col-lg-4">
                <a href="#" class="card bg-dark shadow mb-3">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center text-white gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-linecap="round" stroke-linejoin="round" width="48" height="48" stroke-width="2">
                            <path d="M3 21l1.65 -3.8a9 9 0 1 1 3.4 2.9l-5.05 .9"></path>
                            <path
                                d="M9 10a.5 .5 0 0 0 1 0v-1a.5 .5 0 0 0 -1 0v1a5 5 0 0 0 5 5h1a.5 .5 0 0 0 0 -1h-1a.5 .5 0 0 0 0 1">
                            </path>
                        </svg>
                        <div>
                            <div class="text-center mb-1 fw-semibold">Whatsapp</div>
                            <div class="text-center">+62 812-123-123</div>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-linecap="round" stroke-linejoin="round" width="36" height="36" stroke-width="1">
                            <path d="M5 12l14 0"></path>
                            <path d="M13 18l6 -6"></path>
                            <path d="M13 6l6 6"></path>
                        </svg>
                    </div>
                </a>
            </div>
            <div class="col-lg-4">
                <a href="#" class="card bg-dark shadow mb-3">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center text-white gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-linecap="round" stroke-linejoin="round" width="48" height="48" stroke-width="2">
                            <path d="M4 4m0 4a4 4 0 0 1 4 -4h8a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4z"></path>
                            <path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                            <path d="M16.5 7.5l0 .01"></path>
                        </svg>
                        <div>
                            <div class="text-center mb-1 fw-semibold">Instagram</div>
                            <div class="text-center">@mfashion_id</div>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-linecap="round" stroke-linejoin="round" width="36" height="36" stroke-width="1">
                            <path d="M5 12l14 0"></path>
                            <path d="M13 18l6 -6"></path>
                            <path d="M13 6l6 6"></path>
                        </svg>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection

@push('style')
    <style>
        .nav-link.active {
            background-color: var(--bs-dark) !important;
            color: var(--bs-light) !important
        }
    </style>
@endpush
