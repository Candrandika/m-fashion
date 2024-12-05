@extends('layouts.main.index')

@section('subtitle', 'Keranjang')

@section('content')
    @include('components.alerts.index')

    <form action="" method="post" id="form-fav">
        @csrf
        @method("DELETE")
    </form>

    <div class="container">
        <h4 class="fw-bolder my-5 ms-5">Produk Disukai</h4>
        <div class="my-5">
            <div class="row">
                @forelse ($favorite as $item)
                    <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                        <div class="card shadow mb-3">
                            <img src="{{ asset('storage/'. $item->product->image) }}" alt="" class="card-img-top object-fit-cover" height="250px">
                            <div class="card-body p-2">
                                <h6 class="fw-bolder">{{ $item->product->name }}</h6>
                                <div class="mb-2">Rp {{ $item->product->price }}</div>
                                <div class="d-flex align-items-center gap-1">
                                    
                                        <button data-delete-url="{{ route('favorites.destroy', $item->id) }}" style="border: 1px solid var(--bs-dark);" type="submit" class="btn py-0 px-2 text-danger fs-7 btn-fav"><i class="ti ti-heart-filled"></i></button>
                                    <a href="{{ route('products.show', $item->product->id) }}" class="btn btn-dark w-100"><i class="ti ti-shopping-cart me-2"></i> Keranjang</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div>-- Tidak ada data --</div>
                @endforelse
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.btn-fav', function() {
                const data_delete_url = $(this).data('delete-url')
                $('#form-fav').attr('action', data_delete_url)

                Swal.fire({
                    icon: 'question',
                    title: 'Apakah anda yakin?',
                    text: 'Anda akan menghapus produk ini dari daftar favorit',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#form-fav').submit()
                    }
                })
            })
        })
    </script>
@endpush