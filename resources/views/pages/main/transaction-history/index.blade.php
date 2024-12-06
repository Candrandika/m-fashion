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
                    @forelse ($transaction as $item)
                        <tr>
                            <td><strong>{{ $item->order_id }}</strong></td>
                            <td>Rp.{{ $item->price }}</td>
                            <td>
                                @if($item->status == "PENDING")
                                    <span class="mb-1 badge rounded-pill  bg-secondary-subtle text-secondary">{{ $item->status }}</span>
                                @elseif($item->status == "PROCESS")
                                    <span class="mb-1 badge rounded-pill  bg-primary-subtle text-primary">{{ $item->status }}</span>
                                @elseif ($item->status == "PAID")
                                    <span class="mb-1 badge rounded-pill  bg-success-subtle text-success">{{ $item->status }}</span>
                                @elseif ($item->status == "FAILED")
                                    <span class="mb-1 badge rounded-pill  bg-danger-subtle text-danger">{{ $item->status }}</span>
                                @endif
                            </td>
                            <td>{{ $item->created_at }}</td>
                            <td>
                                <div class="d-flex align-items-center justify-content-center gap-2">

                                    @if($item->status == "SHIPPING")
                                        <form action="#" method="POST">
                                            @method('PUT')
                                            @csrf
                                            <button  class="btn btn-success">Diterima</button>
                                        </form>
                                    @endif
                                    @if($item->status == "PENDING")
                                        <form action="#" method="POST">
                                            @method('PUT')
                                            @csrf
                                            <button  class="btn btn-warning">Batalkan</button>
                                        </form>
                                    @endif
                                    <a href="{{ route('transaction-history.detail', $item->id) }}" class="btn btn-dark">Detail</a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <div>-- Tidak ada data --</div>
                    @endforelse
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
