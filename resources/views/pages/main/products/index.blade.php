@extends('layouts.main.index')


@section('subtitle', 'Daftar Produk')

@section('content')
    <div class="row">
        <div class="col-lg-6">
            <img src="{{ asset('dist/images/profile/user-1.jpg') }}" alt="" class="w-100">
        </div>
        <div class="col-lg-6">
            <h4 class="fw-bolder">Nama Produk</h4>
            <div>Rp 100.000</div>
        </div>
    </div>
@endsection


@push('script')

@endpush

@push('style')
    
@endpush