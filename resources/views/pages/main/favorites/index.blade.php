@extends('layouts.main.index')

@section('subtitle', 'Keranjang')

@section('content')
    <div class="container">
        <h4 class="fw-bolder my-5 ms-5">Produk Disukai</h4>
        <div class="my-5">
            <div class="row">
                @for ($i = 0; $i < 12; $i++)
                <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                    <div class="card shadow mb-3">
                        <img src="{{ asset('dist/images/products/s1.jpg') }}" alt="" class="card-img-top object-fit-cover" height="250px">
                        <div class="card-body p-2">
                            <h6 class="fw-bolder">Lorem ipsum dolor sit amet consectetur, adipisicing elit</h6>
                            <div class="mb-2">Rp 100.000</div>
                            <div class="d-flex align-items-center gap-1">
                                <button style="border: 1px solid var(--bs-dark);" type="button" class="btn py-0 px-2 text-danger fs-7 btn-fav"><i class="ti ti-heart-filled"></i></button>
                                <a href="/products/1" class="btn btn-dark w-100"><i class="ti ti-shopping-cart me-2"></i> Keranjang</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endfor
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.btn-fav', function() {
                Swal.fire({
                    icon: 'question',
                    title: 'Apakah anda yakin?',
                    text: 'Anda akan menghapus produk ini dari daftar favorit',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                    }
                })
            })
        })
    </script>
@endpush