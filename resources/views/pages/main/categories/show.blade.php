@extends('layouts.main.index')


@section('subtitle', 'Katalog Kategori')

@section('content')
    <div class="container">
        <h4 class="fw-bolder my-5 ms-5">Katalog Kategori</h4>
        <div class="row">
            @for($i = 0; $i < 16; $i++)
                <a href="/products/1" class="col-lg-3 mb-3">
                    <img src="{{ asset('dist/images/profile/user-1.jpg') }}" alt="" class="w-100 rounded-2">
                    <h5 class="m-0">Nama Produk</h5>
                    <h5 class="fw-bolder m-0">Rp 100.000</h5>
                </a>
            @endfor
        </div>
    </div>
@endsection


@push('script')

@endpush

@push('style')
    
@endpush