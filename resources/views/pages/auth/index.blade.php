@extends('layouts.auth.index')

@section('subtitle', 'Tingkatkan Penampilanmu Disini')

@section('content')
    <div style="max-width: 500px;">
        <img src="{{ asset('dist/logos/full-light.png') }}" alt="MFashion Logo" height="40" >
        <p class="fs-4 fw-semibold text-white my-2">M-Fashion adalah brand retail dan online fashion store yang menyediakan berbagai produk fashion untuk wanita, pria, dan anak-anak.</p>
        <p class="fs-4 fw-semibold text-white mb-2">M-Fashion berkomitmen untuk memberikan akses mudah ke fashion stylish dan berkualitas bagi semua kalangan. Selain itu, kami jugas berfokus pada tren terkini dengan menyediakan koleksi pakaian yang terus diperbarui untuk semua segmen usia.</p>
        <div class="d-flex align-items-center justify-content-end">
            @if(!auth()->check())
                <div class="d-flex flex-column">
                    <a href="/login" class="btn btn-light fw-semibold">Punya Akun</a>
                    <a href="/register" class="btn text-white fw-semibold">Buat Akun</a>
                </div>
            @else
                <a href="" class="btn btn-light fw-semibold">Dashboard</a>
            @endif
        </div>
    </div>

@endsection

@include('components.alerts.index')