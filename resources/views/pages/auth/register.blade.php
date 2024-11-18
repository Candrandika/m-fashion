@extends('layouts.auth.index')

@section('subtitle', 'Login')

@section('content')
    <div style="max-width: 700px; min-width: min(80vw, 400px)" class="d-flex flex-column align-items-center justify-content-between">
        <h2 class="text-white">Akun Baru</h2>
        <div class="card w-100 bg-white" style="--bs-bg-opacity: .40;">
            <div class="card-body">
                <div class="mb-4">
                    <input type="text" placeholder="Nama Pengguna" class="custom-input form-control bg-white border-0" style="--bs-bg-opacity: .40; height: 50px;">
                </div>
                <div class="mb-4">
                    <input type="email" placeholder="Email" class="custom-input form-control bg-white border-0" style="--bs-bg-opacity: .40; height: 50px;">
                </div>
                <div class="mb-4">
                    <input type="text" placeholder="No. Telp" class="custom-input form-control bg-white border-0" style="--bs-bg-opacity: .40; height: 50px">
                </div>
                <div class="mb-4">
                    <input type="password" placeholder="Kata Sandi" class="custom-input form-control bg-white border-0" style="--bs-bg-opacity: .40; height: 50px">
                </div>
                <div class="d-flex justify-content-center">
                    <a href="/register-success" class="btn bg-light fw-semibold text-dark" style="--bs-bg-opacity: .40;">Daftar</a>
                </div>
            </div>
        </div>
    </div>

@endsection