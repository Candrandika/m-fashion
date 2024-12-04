@extends('layouts.main.index')

@section('subtitle', 'Login')

@section('content')
    <h2 class="text-center fw-bolder mt-5">Selamat Datang</h2>
    <div class="d-flex align-items-center justify-content-center">
        <div style="max-width: 700px; min-width: min(80vw, max(50vw, 400px))" class="card shadow-sm my-5 bg-dark">
            <div class="card-body">
                <form action="{{ route('auth.login') }}" method="post">
                    @csrf
                    <div class="mb-2 input-group">
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
                        <button type="submit" class="btn btn-light fw-semibold w-100">Masuk</button>
                    </div>
                    <div class="text-white text-end mt-2">
                        Belum punya akun? <a href="{{ route('auth.register') }}" class="text-white fw-bold"
                            style="text-decoration: underline;">Daftar</a> sekarang juga
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@include('components.alerts.index')
