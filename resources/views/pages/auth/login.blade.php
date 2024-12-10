@extends('layouts.main.index')

@section('subtitle', 'Login')

@section('content')
    <div class="d-flex align-items-center justify-content-center">
        <div style="max-width: 500px; min-width: min(80vw, max(35vw, 400px))" class="card shadow-none my-5">
            <div class="card-body">
                <h3 class="fw-bolder">Masuk ke Akun Anda</h3>
                <div class="text-start mt-2 mb-4">
                    Belum punya akun? <a href="{{ route('auth.register') }}" class="fw-bold"
                        style="text-decoration: underline;">Daftar</a>
                </div>
                {{-- <button class="btn btn-lg btn-outline-dark w-100 rounded-pill d-flex align-items-center justify-content-center gap-2"><i class="ti ti-brand-google fs-5 fw-bolder"></i> <span>Google</span></button>
                <div class="text-center fw-bolder fs-4 my-4">Atau</div> --}}
                <form action="{{ route('auth.login') }}" method="post">
                    @csrf
                    <div class="mb-3 input-group">
                        <span class="input-group-text fs-6"><i class="ti ti-mail"></i></span>
                        <div class="form-floating">
                            <input type="email" name="email" placeholder="Email" class="form-control bg-white"
                                value="{{ old('email') }}">
                            <label for="email">Email</label>
                        </div>
                    </div>
                    <div class="mb-4 input-group">
                        <div class="input-group-text fs-6"><i class="ti ti-key"></i></div>
                        <div class="form-floating">
                            <input type="password" name="password" placeholder="Kata Sandi" class="form-control bg-white">
                            <label for="password">Kata Sandi</label>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-dark btn-lg rounded-0 fw-semibold w-100">Masuk</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@include('components.alerts.index')
