@extends('layouts.main.index')

@section('subtitle', 'Tingkatkan Penampilanmu Disini')

@section('content')
    <div class="container mt-5">
        <div class="mb-5">
            @include('pages.main.home.widgets.index-carousel-heroes')
        </div>
        <div class="mb-5">
            @include('pages.main.home.widgets.index-carousel-brands')
        </div>
        <div class="mb-5">
            <h4 class="fw-bolder">Kami memberikan yang terbaik <br/>pengalaman pelanggan</h4>
            <div class="fs-6 ps-3" style="border-left: 1px solid black;">Kami memastikan pelanggan kami memiliki pengalaman berbelanja terbaik</div>
        </div>
        <div class="mb-5">
            @include('pages.main.home.widgets.index-service')
        </div>
        <div class="mb-5">
            <h4 class="fw-bolder">Kategori Produk</h4>
            <div class="row">
                @foreach ($categories as $category)
                <div class="col-lg-4 mb-3">
                    <div class="position-relative">
                        <img src="{{ asset('storage/' . $category->image) }}" alt="" class="w-100 rounded-2">
                        <a href="/categories/1" class="btn btn-light d-flex align-items-center justify-content-between fw-semibold rounded-1 position-absolute translate-middle start-50" style="bottom: 0; width: 90%">
                            <div>{{ $category->name }}</div>
                            <i class="ti ti-arrow-right"></i>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="mb-5">
            <h4 class="fw-bolder">Produk Unggulan</h4>
            <div class="row">
                @for($i = 0; $i < 3; $i++)
                <a href="/products/1" class="col-lg-4 mb-3">
                    <img src="{{ asset('dist/images/profile/user-1.jpg') }}" alt="" class="w-100 rounded-2">
                    <h5 class="fw-semibold m-0">Nama Produk</h5>
                    <h6 class="fw-semibold m-0">Rp 100.000</h6>
                </a>
                @endfor
            </div>
        </div>
        <div class="mb-5">
            <div class="d-flex align-items-stretch justify-content-center rounded overflow-hidden">
                <img src="{{ asset('dist/images/profile/user-1.jpg') }}" alt="" class="rounded-start d-none d-lg-block" height="300px">
                <div class="bg-danger d-flex flex-column justify-content-center p-5 text-light" style="flex: 1; height: 300px">
                    <div class="lead">PENAWARAN KHUSUS</div>
                    <h1 class="m-0 text-light fw-bolder">Diskon 35% hanya minggu ini dan dapatkan hadiah istimewa</h1>
                </div>
            </div>
        </div>
        <div class="mb-5">
            <div class="d-flex flex-column gap-3 justify-content-center align-items-center">
                <h2 class="fw-semibold m-0 text-center">Berlanggan buletin kami untuk mendapakan pembaruan<br/> ke koleksi terbaru kami</h2>
                <p class="m-0">Dapakan diskon 10% untuk pesanan pertama Anda hanya dengan berlangganan buletin kami</p>
                <div class="d-flex gap-2">
                    <div class="input-group rounded" style="border: 1px solid black">
                        <div class="input-group-text bg-white"><i class="ti ti-mail"></i></div>
                        <input type="email" class="form-control bg-white border-0" placeholder="masukkan email anda">
                    </div>
                    <button class="btn bg-black text-light">Berlangganan</button>
                </div>
                <div class="text-center">Anda dapat berhenti berlangganan kapan saja <br/>Baca Kebijakan Privasi Kami</div>
            </div>
        </div>
    </div>
@endsection