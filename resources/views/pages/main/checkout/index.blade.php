@extends('layouts.main.index')


@section('subtitle', 'Checkout')

@section('content')
    <div class="container">
        <h4 class="fw-bolder my-5 ms-5">Checkout</h4>
        <div class="row">
            <div class="col-lg-7">
                <div class="card">
                    <form class="card-body row" id="form-shipping">
                        <div class="form-group mb-3 col-md-12">
                            <label for="name" class="mb-2">Nama Lengkap <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name" name="customers_details[first_name]" placeholder="Nama Lengkap Anda">
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <label for="email" class="mb-2">Email <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="email" name="customers_details[email]" placeholder="Email">
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <label for="phone" class="mb-2">Nomor Telepon <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="phone" name="customers_details[phone]" placeholder="Nomor Telepon">
                        </div>
                        <div class="form-group mb-3 col-md-3">
                            <label for="province" class="mb-2">Provinsi</label>
                            <input type="text" class="form-control" id="province" placeholder="Provinsi">
                        </div>
                        <div class="form-group mb-3 col-md-3">
                            <label for="city" class="mb-2">Kota/Kabupaten</label>
                            <input type="text" class="form-control" id="city" name="customers_details[shipping_address][city]" placeholder="Kabupaten">
                        </div>
                        <div class="form-group mb-3 col-md-3">
                            <label for="district" class="mb-2">Kecamatan</label>
                            <input type="text" class="form-control" id="district" placeholder="Kecamatan">
                        </div>
                        <div class="form-group mb-3 col-md-3">
                            <label for="postal_code" class="mb-2">Kode Pos</label>
                            <input type="text" name="customers_details[shipping_address][postal_code]" id="postal_code" class="form-control" placeholder="Nama Lengkap Anda">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="address" class="mb-2">Alamat Lengkap</label>
                            <textarea  id="address" class="form-control" name="customers_details[shipping_address][address]" placeholder="Nama Jalan, Gedung, No. Rumah dan Detal Lainnya (Cth: Blok / Unit No., Patokan)"></textarea>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            @foreach ($cart as $item)
                                <div class="d-flex mb-3 gap-4">
                                    <img src="{{ asset('storage/' . $item->product_detail->product->image) }}"
                                        alt="" class="img-fluid rounded object-fit-cover"
                                        style="aspect-ratio: 1/1; width: 50px;">
                                    <div class="d-flex flex-column justify-content-between">
                                        <div>
                                            <h6 class="">{{ $item->product_detail->product->name }}</h6>
                                            <h6 class="text-muted mb-0">{{ $item->product_detail->color->color }} -
                                                {{ $item->product_detail->size->size }}</h6>
                                            @php
                                                $stock = collect($temp)
                                                    ->filter(function ($q) use ($item) {
                                                        return $q['id'] == $item->id;
                                                    })
                                                    ->first();
                                            @endphp
                                            <p class="m-0">&times;{{ number_format($stock['qty'], 0, ',', '.') }}</p>
                                        </div>
                                    </div>
                                    <h6 class="ms-auto fw-bolder m-0">Rp.
                                        {{ number_format($item->product_detail->product->price, 0, ',', '.') }}</h6>
                                </div>
                            @endforeach
                        </div>
                        <div class="my-3">
                            {{-- <div class="d-flex justify-content-between mb-2">
                                <p class="m-0">Subtotal</p>
                                <h6 class="fw-bolder m-0">Rp. 12.000</h6>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <p class="m-0">Biaya Admin</p>
                                <h6 class="fw-bolder m-0">Rp. 5.000</h6>
                            </div> --}}
                            <div class="d-flex justify-content-between mb-2">
                                <p class="fw-bolder m-0">Total</p>
                                <h6 class="fw-bolder m-0">Rp. 12.000</h6>
                            </div>
                        </div>

                        <button type="button" class="btn btn-dark w-100" id="btn-pay">Checkout</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('script')
    <script>
        $(document).ready(function() {
            $(document).on('click', '#btn-pay', function() {
                const form_data = new FormData($('#form-shipping')[0]);

                $.ajax({
                    url: "",
                    method: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        data: form_data
                    },
                    success: function(res) {
                        console.log(res);
                        if (res.status =='success') {
                            snap.pay(res.snap_token, {
                                // Optional
                                onSuccess: function(result) {
                                    location.reload();
                                },
                                // Optional
                                onPending: function(result) {
                                    location.reload();
                                },
                                // Optional
                                onError: function(result) {
                                    location.reload();
                                }
                            });
                        }
                    }
                })
            })
        })
    </script>
@endpush

@push('style')
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
@endpush
