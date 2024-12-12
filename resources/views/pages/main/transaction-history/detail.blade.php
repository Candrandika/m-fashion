@extends('layouts.main.index')


@section('subtitle', 'Checkout')

@section('content')
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
                            <form action="">
                                <button type="submit" class="btn btn-dark w-100">CHECKOUT</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('script')
    <script>
        $(document).ready(function() {

        })
    </script>
@endpush
