@extends('layouts.auth.index')

@section('subtitle', 'Login Berhasil')

@section('content')
    <h1 class="fw-bolder text-white text-center">Selamat Datang Kembali</h1>
@endsection

@push('script')
    <script>
        const role = "{{ $user->roles?->first()?->name }}";

        setTimeout(() => {
            if(role == "user") window.location.href = "/home";
            else window.location.href = "/admin";
        }, 3000);
    </script>
@endpush