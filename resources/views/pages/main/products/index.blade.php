@extends('layouts.main.index')


@section('subtitle', 'Daftar Produk')

@section('content')
<div class="container">
    <h4 class="fw-bolder my-5 ms-5">Produk @if(request('search')) - {{ request('search') }} @endif</h4>
    <div class="row">
        @for ($i = 0; $i < 16; $i++)
            <a href="/products/1" class="col-lg-3 mb-4">
                <img src="{{ asset('dist/images/profile/user-1.jpg') }}" alt="" class="w-100" style="aspect-ratio: 1/1; object-fit: cover;">
                <h5 class="m-0">Nama Produk</h5>
                <div class="d-flex">
                    <h5 class="fw-bolder m-0">Rp 100.000</h5>
                    <sup class="text-decoration-line-through text-danger" style="top: .5rem; left: .5rem;">Rp 200.000 </sup>
                </div>
            </a>
        @endfor
    </div>
</div>
@endsection


@push('script')
@endpush

@push('style')
@endpush
