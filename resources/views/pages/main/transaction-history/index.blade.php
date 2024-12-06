@extends('layouts.main.index')


@section('subtitle', 'Checkout')

@section('content')
    <div class="container">
        <h4 class="fw-bolder my-5 ms-5">Riwayat Transaksi</h4>
        <div class="my-5">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>Transaksi</th>
                        <th>Total Harga</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>TR-1254367</strong></td>
                        <td>Rp.90.000</td>
                        <td>
                            <span class="mb-1 badge rounded-pill  bg-success-subtle text-success">Selesai</span>
                        </td>
                        <td>29 November 2024</td>
                        <td>
                            <button type="button" class="btn btn-dark">Detail</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection


@push('script')
    <script>
        $(document).ready(function() {

        })
    </script>
@endpush
