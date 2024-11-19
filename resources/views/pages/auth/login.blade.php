@extends('layouts.auth.index')

@section('subtitle', 'Login')

@section('content')
    <div style="max-width: 700px; min-width: min(80vw, 400px)" class="d-flex flex-column align-items-center justify-content-between">
        <h2 class="text-white">Selamat Datang</h2>
        <div class="card w-100 bg-white" style="--bs-bg-opacity: .40;">
            <div class="card-body">
                <form action="{{ route('auth.login') }}" method="post">
                    @csrf
                    <div class="mb-4">
                        <input type="text" name="email" placeholder="Email" class="custom-input form-control bg-white border-0" style="--bs-bg-opacity: .40; height: 50px;">
                    </div>
                    <div class="mb-4">
                        <input type="password" name="password" placeholder="Kata Sandi" class="custom-input form-control bg-white border-0" style="--bs-bg-opacity: .40; height: 50px">
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn bg-light fw-semibold text-dark" style="--bs-bg-opacity: .40;">Masuk</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection