@extends('layouts.main.index')


@section('subtitle', 'Checkout')

@section('content')
    <div class="container">
        <h4 class="fw-bolder my-5 ms-5">Checkout</h4>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body row">
                        <div class="form-group mb-3 col-md-12">
                            <label for="exampleFormControlInput1" class="mb-2">Nama Lengkap</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama Lengkap Anda">
                        </div>
                        <div class="form-group mb-3 col-md-12">
                            <label for="exampleFormControlInput1" class="mb-2">Nomor Telepon</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama Lengkap Anda">
                        </div>
                        <div class="form-group mb-3 col-md-3">
                            <label for="exampleFormControlInput1" class="mb-2">Provinsi</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama Lengkap Anda">
                        </div>
                        <div class="form-group mb-3 col-md-3">
                            <label for="exampleFormControlInput1" class="mb-2">Kota/Kabupaten</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama Lengkap Anda">
                        </div>
                        <div class="form-group mb-3 col-md-3">
                            <label for="exampleFormControlInput1" class="mb-2">Kecamatan</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama Lengkap Anda">
                        </div>
                        <div class="form-group mb-3 col-md-3">
                            <label for="exampleFormControlInput1" class="mb-2">Kode Pos</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama Lengkap Anda">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="exampleFormControlInput1" class="mb-2">Alamat Lengkap</label>
                            <textarea name="address" id="exampleFormControlInput1" rows="5" class="form-control" placeholder="Nama Jalan, Gedung, No. Rumah dan Detal Lainnya (Cth: Blok / Unit No., Patokan)"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body row">
                                <div class="col-md-12 row mb-3">
                                    <div class="col-md-3">
                                        <img src="{{ asset('dist/images/profile/user-1.jpg') }}" alt="" class="img-fluid rounded" >
                                    </div>
                                    <div class="col-md-9 d-flex flex-column justify-content-between">
                                        <div class="col-md-12">
                                            <h6 class="m-0">Nama Produk</h6>
                                            <p class="m-0">x1</p>
                                        </div>
                                        <div class="col-md-12">
                                            <h6 class="fw-bolder m-0">Rp. 12.000</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 row mb-5">
                                    <div class="col-md-3">
                                        <img src="{{ asset('dist/images/profile/user-1.jpg') }}" alt="" class="img-fluid rounded" >
                                    </div>
                                    <div class="col-md-9 d-flex flex-column justify-content-between">
                                        <div class="col-md-12">
                                            <h6 class="m-0">Nama Produk</h6>
                                            <p class="m-0">x1</p>
                                        </div>
                                        <div class="col-md-12">
                                            <h6 class="fw-bolder m-0">Rp. 12.000</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 row mb-5">
                                    <div class="col-md-12 d-flex justify-content-between mb-2">
                                        <p class="m-0">Subtotal</p>
                                        <h6 class="fw-bolder m-0">Rp. 12.000</h6>
                                    </div>
                                    <div class="col-md-12 d-flex justify-content-between mb-2">
                                        <p class="m-0">Biaya Admin</p>
                                        <h6 class="fw-bolder m-0">Rp. 5.000</h6>
                                    </div>
                                    <div class="col-md-12 d-flex justify-content-between mb-2">
                                        <p class="fw-bolder m-0">Total</p>
                                        <h6 class="fw-bolder m-0">Rp. 12.000</h6>
                                    </div>
                                </div>

                                <button class="btn btn-dark">Checkout</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('script')

@endpush

@push('style')
    
@endpush