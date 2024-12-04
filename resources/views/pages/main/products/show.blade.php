@extends('layouts.main.index')


@section('subtitle', 'Daftar Produk')

@section('content')
    @include('pages.main.products.widgets.show-modal-show-image')

    @include('components.alerts.index')

    <div class="container">
        <div class="row my-5">
            <div class="col-lg-5">
                <img data-bs-toggle="modal" data-bs-target="#modal-show-image" src="{{ asset($product->image ? 'storage/' . $product->image : 'dist/images/products/s1.jpg') }}"
                    alt="" class="w-100 object-fit-cover btn-show-image" style="aspect-ratio: 1/1;">
                <div class="mt-3">
                    <div class="owl-carousel counter-carousel owl-theme">
                        @foreach ($product->product_images as $index => $img)
                            @if($img->type == 'image')
                            <div class="item">
                                <img data-bs-toggle="modal" data-bs-target="#modal-show-image"
                                    src="{{ asset('storage/' . $img->image) }}" alt="gambar produk {{ $index }}"
                                    class="object-fit-cover rounded w-100 btn-show-image" style="aspect-ratio: 1/1;"
                                    data-img="{{ $img }}">
                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <h4 class="fw-bolder mb-0">{{ $product->name }}</h4>
                <div class="fs-4 mb-4">Rp {{ $product->price }}</div>

                <div id="color">
                    <h6 class="fw-bolder mb-0">Pilih Warna</h6>
                    <div class="row">
                        @foreach ($product->colors as $item)
                            <div class="col-auto px-0">
                                <label class="form-check form-check-image m-0 p-0">
                                    <input class="form-check-input d-none" type="radio" name="option"
                                        value="{{ $item->id }}">
                                    <img src="{{ asset('storage/'. $item->image) }}" alt="Option 1"
                                        class="form-check-image" height="100px">
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div id="size">
                    <div class="d-flex align-items-center justify-content-between">
                        <h6 class="fw-bolder mb-0">Pilih Ukuran</h6>
                        <div class="d-flex align-items-center gap-2"><span style="width: 7px; height: 7px;"
                                class="bg-danger"></span> Ukuran hanya tersisa beberapa item</div>
                    </div>
                    <div class="btn-group btn-group-lg w-100 bg-light" role="radio" aria-label="Select Size">
                        <input type="radio" class="btn-check" name="size" id="size-s" value="s"
                            autocomplete="off">
                        <label for="size-s" class="btn btn-outline-dark">S</label>

                        <input type="radio" class="btn-check" name="size" id="size-m" value="m"
                            autocomplete="off">
                        <label for="size-m" class="btn btn-outline-dark relative">M <div
                                class="position-absolute bg-danger" style="width: 7px; height: 7px; top: 5px; right: 5px">
                            </div></label>

                        <input type="radio" class="btn-check" name="size" id="size-l" value="l"
                            autocomplete="off">
                        <label for="size-l" class="btn btn-outline-dark">L</label>

                        <input type="radio" class="btn-check" name="size" id="size-xl" value="xl"
                            autocomplete="off">
                        <label for="size-xl" class="btn btn-outline-dark">XL</label>
                    </div>
                </div>

                <div class="d-flex w-100 mt-4 gap-2">
                    <button type="button" class="btn btn-lg btn-dark rounded-0" style="flex: 1;">Tambahkan ke
                        Keranjang</button>
                    @if (count($product->favorite) > 0)
                        <form action="{{ route('favorites.destroy', $product->favorite->first()->id) }}" method="post">
                            @csrf
                            @method("delete")
                            <button type="submit" class="btn btn-lg rounded-0" style="border: 1px solid black"><i class="ti ti-heart-filled text-danger"></i></button>
                        </form>
                    @else
                        <form action="{{ route('favorites.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <button type="submit" class="btn btn-lg btn-outline-dark rounded-0"><i
                                class="ti ti-heart"></i></button>
                        </form>
                    @endif
                    {{-- <button type="button" class="btn btn-lg btn-outline-dark rounded-0"><i
                            class="ti ti-upload"></i></button> --}}
                </div>

                <div>
                    <div class="accordion" id="product-accordion">
                        <div class="accordion-item shadow-none border-0">
                            <h2 class="accordion-header">
                                <button class="px-0 accordion-button border-0 shadow-none fw-bolder" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapse-desc" aria-expanded="true"
                                    aria-controls="collapse-desc">
                                    Deskripsi & Fit
                                </button>
                            </h2>
                            <div id="collapse-desc" class="accordion-collapse collapse" data-bs-parent="#product-accordion">
                                <div class="accordion-body border-0">
                                    {!! $product->desc !!}
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item shadow-none border-0">
                            <h2 class="accordion-header">
                                <button class="px-0 accordion-button border-0 shadow-none fw-bolder" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapse-pemasok" aria-expanded="true"
                                    aria-controls="collapse-pemasok">
                                    Pemasokk Bahan
                                </button>
                            </h2>
                            <div id="collapse-pemasok" class="accordion-collapse collapse"
                                data-bs-parent="#product-accordion">
                                <div class="accordion-body border-0">
                                    {!! $product->supplier !!}
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item shadow-none border-0">
                            <h2 class="accordion-header">
                                <button class="px-0 accordion-button border-0 shadow-none fw-bolder" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapse-pengiriman" aria-expanded="true"
                                    aria-controls="collapse-pengiriman">
                                    Pengiriman dan Pengembalian
                                </button>
                            </h2>
                            <div id="collapse-pengiriman" class="accordion-collapse collapse"
                                data-bs-parent="#product-accordion">
                                <div class="accordion-body border-0">
                                    {!! $product->shipping_return !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('script')
    <script src="{{ asset('dist/libs/owl.carousel/dist/owl.carousel.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(".counter-carousel").owlCarousel({
                loop: true,
                rtl: true,
                margin: 5,
                mouseDrag: true,

                nav: false,

                responsive: {
                    0: {
                        items: 2,
                        loop: true,
                    },
                    576: {
                        items: 2,
                        loop: true,
                    },
                    768: {
                        items: 3,
                        loop: true,
                    },
                    1200: {
                        items: 4,
                        loop: true,
                    },
                    1400: {
                        items: 4,
                        loop: true,
                    },
                },
            });
        })
    </script>
@endpush

@push('style')
    <link rel="stylesheet" href="{{ asset('dist/libs/owl.carousel/dist/assets/owl.carousel.min.css') }}">
    <style>
        .form-check-image {
            cursor: pointer;
            border: 2px solid transparent;
            border-radius: 5px;
            padding: 5px;
            transition: border-color 0.3s ease;
        }

        .form-check-input:checked+img {
            border-color: var(--bs-dark);
        }
    </style>
@endpush
