@extends('layouts.main.index')


@section('subtitle', 'Daftar Produk')

@section('content')
<div class="container mb-5">
    <h4 class="fw-bolder my-5 ms-5">Produk @if(request('search')) - {{ request('search') }} @endif</h4>
    <div class="row">
        @forelse ($products as $product)
            <a href="/products/{{ $product->id }}" class="col-lg-3 mb-4">
                <img src="{{ asset($product->image ? 'storage/'.$product->image :'dist/images/profile/user-1.jpg') }}" alt="" class="w-100" style="aspect-ratio: 1/1; object-fit: cover;">
                <h5 class="m-0">{{ $product->name }}</h5>
                <div class="d-flex">
                    <h5 class="fw-bolder m-0">Rp {{ number_format($product->price, '0', ',', '.') }}</h5>
                    {{-- <sup class="text-decoration-line-through text-danger" style="top: .5rem; left: .5rem;">Rp 200.000 </sup> --}}
                </div>
            </a>
        @empty
            <div class="text-center text-muted fw-bolder bg-light-dark text-white p-4 rounded">-- tidak ada produk --</div>
        @endforelse
    </div>
    {!! $products->links() !!}
</div>
@endsection


@push('script')
@endpush

@push('style')
@endpush
