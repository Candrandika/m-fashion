@extends('layouts.auth.index')

@section('subtitle', 'Registrasi')

@section('content')
    <div style="max-width: 700px; min-width: min(80vw, 400px)" class="d-flex flex-column align-items-center justify-content-between">
        <h2 class="text-white">Akun Baru</h2>
        <div class="card w-100 bg-white" style="--bs-bg-opacity: .40;">
            <div class="card-body">
                <form action="{{ route('auth.register') }}" method="post">
                    @csrf
                    <div class="mb-4">
                        <input type="text" name="name" placeholder="Nama Pengguna" class="custom-input form-control bg-white border-0" style="--bs-bg-opacity: .40; height: 50px;">
                    </div>
                    <div class="mb-4">
                        <input type="email" name="email" placeholder="Email" class="custom-input form-control bg-white border-0" style="--bs-bg-opacity: .40; height: 50px;">
                    </div>
                    <div class="mb-4">
                        <input type="text" name="phone" placeholder="No. Telp" class="custom-input form-control bg-white border-0" style="--bs-bg-opacity: .40; height: 50px">
                    </div>
                    <div class="mb-4">
                        <input type="password" name="password" placeholder="Kata Sandi" class="custom-input form-control bg-white border-0" style="--bs-bg-opacity: .40; height: 50px">
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn bg-light fw-semibold text-dark" style="--bs-bg-opacity: .40;">Daftar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection