@extends('layouts.main.index')


@section('subtitle', 'Checkout')

@section('content')
    @include('components.alerts.index')

    <div class="container">
        <h4 class="fw-bolder my-5 ms-5">Checkout</h4>
        <div class="row">
            <div class="col-lg-7">
                <div class="card">
                    <form class="card-body row" id="form-shipping" action="{{ route('transactions.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="method_type" value="auto"/>
                        <button type="submit" id="btn-submit" class="d-none"></button>
                        <div class="form-group mb-3 col-md-12">
                            <label for="name" class="mb-2">Nama Lengkap <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name" name="customer_details[first_name]"
                                placeholder="Nama Lengkap Anda" required>
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <label for="email" class="mb-2">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="email" name="customer_details[email]"
                                placeholder="Email" required>
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <label for="phone" class="mb-2">Nomor Telepon <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="phone" name="customer_details[phone]"
                                placeholder="Nomor Telepon" required>
                        </div>
                        <div class="form-group mb-3 col-md-3">
                            <label for="province" class="mb-2">Provinsi <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="province"
                                name="customer_details[shipping_address][province]" placeholder="Provinsi" required>
                        </div>
                        <div class="form-group mb-3 col-md-3">
                            <label for="city" class="mb-2">Kota/Kabupaten <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="city"
                                name="customer_details[shipping_address][city]" placeholder="Kabupaten" required>
                        </div>
                        <div class="form-group mb-3 col-md-3">
                            <label for="district" class="mb-2">Kecamatan <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="district"
                                name="customer_details[shipping_address][district]" placeholder="Kecamatan" required>
                        </div>
                        <div class="form-group mb-3 col-md-3">
                            <label for="postal_code" class="mb-2">Kode Pos <span class="text-danger">*</span></label>
                            <input type="number" name="customer_details[shipping_address][postal_code]" id="postal_code"
                                class="form-control" placeholder="Kode Pos" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="address" class="mb-2">Alamat Lengkap <span class="text-danger">*</span></label>
                            <textarea id="address" class="form-control" name="customer_details[shipping_address][address]"
                                placeholder="Nama Jalan, Gedung, No. Rumah dan Detal Lainnya (Cth: Blok / Unit No., Patokan)" required></textarea>
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

                                                  $total_price += $item->product_detail->product->price * $stock['qty'];
                                            @endphp
                                            <p class="m-0">&times;{{ number_format($stock['qty'], 0, ',', '.') }}</p>
                                        </div>
                                    </div>
                                    <h6 class="ms-auto fw-bolder m-0">Rp.
                                        {{ number_format($item->product_detail->product->price * $stock['qty'], 0, ',', '.') }}
                                    </h6>
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
                                <h6 class="fw-bolder m-0">Rp. {{ number_format($total_price, 0, ',', '.') }}</h6>
                            </div>
                        </div>

                        
                        <div class="mb-2 mt-3">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="method_pay" id="method_pay_1" value="auto" checked>
                                <label class="form-check-label" for="method_pay_1">Otomatis</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="method_pay" id="method_pay_2" value="manual">
                                <label class="form-check-label" for="method_pay_2">Manual</label>
                            </div>
                        </div>

                        <button type="button" class="btn btn-dark w-100" id="btn-pay">Checkout</button>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body py-2">
                        <p class="mb-2">Note :</p>
                        <ul style="list-style: disc" class="fs-2">
                            <li>Otomatis : pembayaran akan di verifikasi otomatis oleh sistem</li>
                            <li>Manual : pembayaran akan diverifikasi oleh admin secara langsung (pembayaran di lokasi)</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form action="{{ route('callback') }}" id="form-pay" method="POST">
        @csrf
        <input type="hidden" name="result" value="">
    </form>
@endsection


@push('script')
    <script>
        $(document).ready(function() {
            $(document).on('click', '#btn-pay', function() {
                $('#btn-submit').trigger('click')
            })

            $(document).on('submit', '#form-shipping', function(e) {
                if($('[name=method_pay]:checked').val() == 'auto') {
                    e.preventDefault();
    
                    const form_data = new FormData($('#form-shipping')[0]);
    
                    const form_obj = {}
                    
                    form_data.forEach((val, key) => {
                        form_obj[key] = val
                    })
    
                    $.ajax({
                        url: "{{ route('transactions.store') }}",
                        method: 'POST',
                        data: form_obj,
                        success: function(res) {
                            if (res.is_success) {
                                snap.pay(res.snap_token, {
                                    onSuccess: function(result) {
                                        send_res_to_form(result)
                                    },
                                    onPending: function(result) {
                                        send_res_to_form(result)
                                    },
                                    onError: function(result) {
                                        send_res_to_form(result)
                                    },
                                    onClose: function(result) {
                                        Toaster('warning', 'Pembayaran tidak dilanjutkan')
                                    }
                                });
                            }
                        }
                    })
                }
            })

            function send_res_to_form(result) {
                $('[name=result]').val(JSON.stringify(result))
                $('#form-pay').submit()
            }

            handling_method_type()

            $(document).on('change click', $('[name=method_pay]'), handling_method_type)

            function handling_method_type() {
                $('[name=method_type]').val(($('[name=method_pay]:checked').val()))
            }
        })
    </script>
@endpush

@push('style')
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
@endpush
