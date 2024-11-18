@extends('layouts.auth.index')

@section('subtitle', 'Login Berhasil')

@section('content')
    <h1 class="fw-bolder text-white text-center">Selamat Datang Kembali</h1>
@endsection

@push('script')
    <script>
        setTimeout(() => {
            window.location.href = "/admin";
        }, 3000);
    </script>
@endpush