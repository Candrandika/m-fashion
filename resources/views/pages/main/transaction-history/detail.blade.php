@extends('layouts.main.index')


@section('subtitle', 'Checkout')

@section('content')
    @include('components.alerts.index')
    <div class="container">
        <h4 class="fw-bolder my-5 ms-5">Detail Riwayat Transaksi <span
                class="mb-1 badge rounded-pill  bg-success-subtle text-success ms-3">{{ $transaction->status }}</span></h4>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="my-5">
                            <table class="table align-middle" id="product-carts">
                                <thead>
                                    <tr>
                                        <th>Produk</th>
                                        <th>Harga Satuan</th>
                                        <th>Kuantitas</th>
                                        <th>Total Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($item_details as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>Rp. {{ $item->price }}</td>
                                        <td>{{ $item->quantity }} </td>
                                        <td>Rp. {{ $item->quantity * $item->price }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <strong>{{ $customer_detail->first_name }}</strong>
                        <p class="text-muted m-0">{{ $customer_detail->email }}</p>
                        <p class="text-muted m-0">{{ $customer_detail->phone }}</p>

                        <p class="mt-3">
                            {{ $customer_detail->shipping_address->address }},
                            {{ $customer_detail->shipping_address->district }},
                            {{ $customer_detail->shipping_address->city }},
                            {{ $customer_detail->shipping_address->province }}
                            {{ $customer_detail->shipping_address->postal_code }}
                        </p>
                        @if ($transaction->status == "PENDING")
                            <button type="button" class="btn btn-dark w-100 btn-checkout">CHECKOUT</button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form action="{{ route('callback') }}" id="form-pay" method="POST">
        @csrf
        <input type="hidden" name="result" value="">
    </form
@endsection


@push('script')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.btn-checkout', function() {
                snap.pay("{{ $transaction->snap_token }}", {
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
                        console.log({result})
                        Toaster('warning', 'Pembayaran tidak dilanjutkan')
                    }
                });
            })

            function send_res_to_form(result) {
                $('[name=result]').val(JSON.stringify(result))
                $('#form-pay').submit()
            }
        })
    </script>
@endpush

@push('style')
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
@endpush
