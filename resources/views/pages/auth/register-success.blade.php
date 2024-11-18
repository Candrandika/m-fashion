@extends('layouts.auth.index')

@section('subtitle', 'Pendaftaran Berhasil')

@section('content')
    <h1 class="fw-bolder text-white text-center">Berhasil Membuat Akun</h1>
@endsection

@push('script')
    <script>
        setTimeout(() => {
            window.location.href = "/admin";
        }, 3000);
    </script>
@endpush