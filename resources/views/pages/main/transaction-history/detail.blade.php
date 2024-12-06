@extends('layouts.main.index')


@section('subtitle', 'Checkout')

@section('content')
    <div class="container">
        <h4 class="fw-bolder my-5 ms-5">Detail Riwayat Transaksi <span class="mb-1 badge rounded-pill  bg-success-subtle text-success ms-3">Selesai</span></h4>
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
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <strong>Wiradarma Nurmagika Bagaskara</strong>
                        <p class="text-muted m-0">wira@gmail.com</p>
                        <p class="text-muted m-0">083848020111</p>

                        <p class="mt-3">
                            Jl Pemuda No 11, Ds Kebobang, Kec Wonosari, Kab. Wonosari, Kab. Wonosari, Jawa Barat 45111
                        </p>
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
