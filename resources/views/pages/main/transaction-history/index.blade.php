@extends('layouts.main.index')


@section('subtitle', 'Checkout')

@section('content')
    @include('components.alerts.index')
    
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
                                @elseif($item->status == "WAITING_ACCEPTION")
                                    <span class="mb-1 badge rounded-pill  bg-info-subtle text-info">{{ $item->status }}</span>
                                @elseif($item->status == "PROCESS")
                                    <span class="mb-1 badge rounded-pill  bg-primary-subtle text-primary">{{ $item->status }}</span>
                                @elseif ($item->status == "PAID")
                                    <span class="mb-1 badge rounded-pill  bg-success-subtle text-success">{{ $item->status }}</span>
                                @elseif ($item->status == "FAILED")
                                    <span class="mb-1 badge rounded-pill  bg-danger-subtle text-danger">{{ $item->status }}</span>
                                @elseif ($item->status == "EXPIRED")
                                    <span class="mb-1 badge rounded-pill  bg-warning-subtle text-warning">{{ $item->status }}</span>
                                @elseif ($item->status == "CANCELED")
                                    <span class="mb-1 badge rounded-pill  bg-danger-subtle text-danger">{{ $item->status }}</span>
                                @elseif ($item->status == "REJECTED")
                                    <span class="mb-1 badge rounded-pill  bg-danger-subtle text-danger">{{ $item->status }}</span>
                                @elseif ($item->status == "SHIPPING")
                                    <span class="mb-1 badge rounded-pill  bg-dark text-white">{{ $item->status }}</span>
                                @elseif ($item->status == "COMPLETE")
                                    <span class="mb-1 badge rounded-pill  bg-success-subtle text-success">{{ $item->status }}</span>
                                @else
                                    <span class="mb-1 badge rounded-pill  bg-success-subtle text-success">{{ $item->status }}</span>
                                @endif
                            </td>
                            <td>{{ $item->created_at }}</td>
                            <td>
                                <div class="d-flex align-items-center justify-content-center gap-2">

                                    @if($item->status == "SHIPPING")
                                    <div>
                                        <button type="button" class="btn btn-success btn-acc">Diterima</button>
                                        <form action="{{ route('transaction-history.update', $item->id) }}" method="POST">
                                            @method('PUT')
                                            @csrf
                                            <input type="hidden" name="status" value="accepted">
                                        </form>
                                    </div>
                                    @endif
                                    @if($item->status == "PENDING" || $item->status == "WAITING_ACCEPTION")
                                    <div>
                                        <form action="{{ route('transaction-history.update', $item->id) }}" method="POST">
                                            @method('PUT')
                                            @csrf
                                            <input type="hidden" name="status" value="rejected">
                                        </form>
                                        <button type="button" class="btn btn-warning btn-cancel">Batalkan</button>
                                    </div>
                                    @endif
                                    <a href="{{ route('transaction-history.detail', $item->id) }}" class="btn btn-dark">Detail</a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <th colspan="5" class="text-center fw-bolder text-muted">-- Tidak ada data --</th>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection


@push('script')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.btn-acc', function() {
                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Produk sudah anda terima!",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Sudah!',
                    cancelButtonText: 'Belum'
                }).then((result) => {
                    if (result.isConfirmed) $(this).parent().find('form').submit()
                })
            })
            $(document).on('click', '.btn-cancel', function() {
                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Transaksi akan dibatalkan!",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Yakin',
                    cancelButtonText: 'Tidak'
                }).then((result) => {
                    if (result.isConfirmed) $(this).parent().find('form').submit()
                })
            })
        })
    </script>
@endpush
