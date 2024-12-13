@extends('layouts.main.index')


@section('subtitle', 'Daftar Produk')

@section('content')
    {{-- @include('pages.main.products.widgets.show-modal-show-image') --}}
    @include('pages.main.products.widgets.show-modal-auto-size')

    @include('components.alerts.index')

    <div class="container">
        <div class="row my-5">
            <div class="col-lg-5">
                <img src="{{ asset($product->image ? 'storage/' . $product->image : 'dist/images/products/s1.jpg') }}" alt="" class="w-100 object-fit-cover btn-show-image" style="aspect-ratio: 1/1;" id="big-product-img">
                <div class="mt-3">
                    <div class="owl-carousel counter-carousel owl-theme">
                        @if($product->image)
                        <div class="item">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="" class="object-fit-cover rounded w-100 btn-show-image" style="aspect-ratio: 1/1;">
                        </div>
                        @endif
                        @foreach ($product->product_images as $index => $img)
                            @if ($img->type == 'image')
                                <div class="item">
                                    <img src="{{ asset('storage/' . $img->image) }}" alt="gambar produk {{ $index }}" class="object-fit-cover rounded w-100 btn-show-image" style="aspect-ratio: 1/1;">
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>

            <form class="col-lg-7" action="{{ route('carts.store') }}" method="POST">
                @csrf
                <h4 class="fw-bolder mb-0">{{ $product->name }}</h4>
                <div class="fs-4 mb-4">Rp {{ $product->price }}</div>

                <div id="color">
                    <h6 class="fw-bolder mb-0">Pilih Warna</h6>
                    <div class="row">
                        @foreach ($product->colors as $item)
                            <div class="col-auto px-0">
                                <label class="form-check m-0 p-0 mb-2">
                                    <input class="form-check-input d-none" type="radio" name="color"
                                        value="{{ $item->id }}" data-sizes="{{ $item->sizes }}"
                                        data-product-details="{{ $item->product_details }}" required>
                                    <div class="form-check-image" title="{{ $item->color }}">
                                        <img src="{{ asset('storage/' . $item->image) }}" alt="Warna {{ $item->color }}"
                                            class="object-fit-contain" height="120px" style="aspect-ratio: 1/1">
                                        <div class="text-center">{{ $item->color }}</div>
                                    </div>
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <input type="hidden" name="product_detail_id">

                <div id="size">
                    <div class="d-flex align-items-center justify-content-between">
                        <h6 class="fw-bolder mb-0">Pilih Ukuran</h6>
                        <div class="d-flex align-items-center gap-2"><span style="width: 7px; height: 7px;"
                                class="bg-danger"></span> Ukuran hanya tersisa beberapa item</div>
                    </div>
                    <div class="btn-group btn-group-lg w-100 bg-light" role="radio" aria-label="Select Size">
                        @foreach ($product->sizes as $size)
                            <input type="radio" class="btn-check" name="size" id="size-{{ $size->id }}"
                                value="{{ $size->id }}" autocomplete="off" data-product-detail-id="" required disabled>
                            <label for="size-{{ $size->id }}" class="btn btn-outline-dark">{{ $size->size }} <div
                                    class="position-absolute bg-danger red-dot"
                                    style="width: 7px; height: 7px; top: 5px; right: 5px; display: none;">
                                </div></label>
                        @endforeach
                    </div>
                </div>

                <button type="button" class="fw-bolder mt-2 border-0 bg-transparent text-decoration-underline"
                    data-bs-toggle="modal" data-bs-target="#modal-auto-size">Fitur Panduan Ukuran</button>

                <div class="d-flex w-100 mt-4 gap-2">
                    <button type="submit" class="btn btn-lg btn-dark rounded-0" style="flex: 1;">Tambahkan ke
                        Keranjang</button>

                    @if (count($product->favorite) > 0)
                        <button type="button" class="btn btn-lg rounded-0 btn-fav" style="border: 1px solid black"><i
                                class="ti ti-heart-filled text-danger"></i></button>
                    @else
                        <button type="button" class="btn btn-lg btn-outline-dark rounded-0 btn-fav"><i
                                class="ti ti-heart"></i></button>
                    @endif
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
            </form>
            @if (count($product->favorite) > 0)
                <form action="{{ route('favorites.destroy', $product->favorite->first()->id) }}" method="post"
                    id="form-fav">
                    @csrf
                    @method('delete')
                </form>
            @else
                <form action="{{ route('favorites.store') }}" method="post" id="form-fav">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                </form>
            @endif
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

            $(document).on('click', '.btn-fav', function() {
                $('#form-fav').submit()
            })

            $(document).on('change', '[name=color]', function() {
                const sizes = $(this).data('sizes');
                const product_details = $(this).data('product-details');

                $('[name=size]').each(function(index, el) {
                    const value = $(el).val()
                    let current_detail = {}
                    let detail_id

                    if (product_details.some((detail) => {
                            if (detail.size_id == value) {
                                current_detail = detail
                            }
                            return detail.size_id == value
                        })) {
                        $(el).prop('disabled', false)
                    } else {
                        $(el).prop('disabled', true)
                    }

                    if (current_detail.stock && current_detail.stock < 5) {
                        console.log(current_detail.stock)
                        $(`[for=${el.id}] .red-dot`).show()
                    } else if (!current_detail.id) {
                        $(`[for=${el.id}] .red-dot`).hide()
                        $(el).prop('disabled', true)
                    } else {
                        $(`[for=${el.id}] .red-dot`).hide()
                    }

                    if (current_detail.id) detail_id = current_detail.id

                    $(el).attr('data-product-detail-id', detail_id)
                    $(el).prop('checked', false)
                })
            })
            $(document).on('change', '[name=size]', function() {
                const product_detail_id = $(this).data('product-detail-id');
                $('[name=product_detail_id]').val(product_detail_id)
            })

            $(document).on('click', '.btn-show-image', function() {
                let src = $(this).attr('src');

                $('#modal-show-image img').attr('src', src);
                $('#big-product-img').attr('src', src);
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

        .form-check-input:checked+.form-check-image {
            border-color: var(--bs-dark);
        }
    </style>
@endpush
