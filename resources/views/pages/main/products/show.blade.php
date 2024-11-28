@extends('layouts.main.index')


@section('subtitle', 'Daftar Produk')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-6">
                <img src="{{ asset('dist/images/profile/user-1.jpg') }}" alt="" class="w-100">
            </div>
            <div class="col-lg-6">
                <h4 class="fw-bolder mb-0">Nama Produk</h4>
                <div class="fs-4 mb-4">Rp 100.000</div>
                <div class="d-flex align-items-center justify-content-between">
                    <h6 class="fw-bolder mb-0">Pilih Ukuran</h6>
                    <div class="d-flex align-items-center gap-2"><span style="width: 7px; height: 7px;" class="bg-danger"></span> Ukuran hanya tersisa beberapa item</div>
                </div>
                <div class="btn-group btn-group-lg w-100 bg-light" role="radio" aria-label="Select Size">
                    <input type="radio" class="btn-check" name="size" id="size-s" value="s" autocomplete="off">
                    <label for="size-s" class="btn btn-outline-dark">S</label>

                    <input type="radio" class="btn-check" name="size" id="size-m" value="m" autocomplete="off">
                    <label for="size-m" class="btn btn-outline-dark relative">M <div class="position-absolute bg-danger" style="width: 7px; height: 7px; top: 5px; right: 5px"></div></label>

                    <input type="radio" class="btn-check" name="size" id="size-l" value="l" autocomplete="off">
                    <label for="size-l" class="btn btn-outline-dark">L</label>

                    <input type="radio" class="btn-check" name="size" id="size-xl" value="xl" autocomplete="off">
                    <label for="size-xl" class="btn btn-outline-dark">XL</label>
                </div>

                <div class="d-flex w-100 mt-4 gap-2">
                    <button type="button" class="btn btn-lg btn-dark rounded-0" style="flex: 1;">Tambahkan ke Keranjang</button>
                    <button type="button" class="btn btn-lg btn-outline-dark rounded-0"><i class="ti ti-upload"></i></button>
                </div>

                <div>
                    <div class="accordion" id="product-accordion">
                        <div class="accordion-item shadow-none border-0">
                            <h2 class="accordion-header">
                                <button class="px-0 accordion-button border-0 shadow-none fw-bolder" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-desc" aria-expanded="true" aria-controls="collapse-desc">
                                    Deskripsi & Fit
                                </button>
                            </h2>
                            <div id="collapse-desc" class="accordion-collapse collapse" data-bs-parent="#product-accordion">
                                <div class="accordion-body border-0">
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aperiam exercitationem laudantium in dolor, assumenda natus beatae fuga ratione delectus odio. Officia culpa, nihil aperiam illum suscipit accusantium porro animi maxime eum omnis qui eos ut excepturi quod mollitia aliquid quia quisquam quam consequatur quae quaerat veritatis iusto quos vitae! At, quae? Soluta harum, ipsum quos eum voluptate possimus iste adipisci ipsam molestias ea aspernatur tenetur suscipit consectetur autem quo magni dicta, sunt vitae qui modi! Eligendi, possimus esse voluptatibus placeat temporibus iure iste aperiam aliquam, omnis et quisquam sequi accusantium labore autem iusto adipisci praesentium velit cumque facilis laudantium voluptates vero. Quod quae exercitationem incidunt blanditiis nulla labore neque voluptatum, ab, voluptatibus inventore, ipsam necessitatibus! Tempora in quaerat fugiat molestiae amet eaque accusantium? Nisi sequi necessitatibus molestiae repellat unde a voluptatum laborum dignissimos qui. Iste repellendus ullam autem sapiente voluptas est saepe harum natus consequuntur eaque nemo, doloremque aliquam facere praesentium. Quasi dolore ipsa voluptatibus, nulla nam harum mollitia sed tempora impedit. Ipsum, velit aut nulla excepturi voluptatibus dolorum sequi, cupiditate ratione assumenda id dicta eaque consectetur aperiam, veritatis eos tenetur quo recusandae? Iure aut molestias earum optio voluptas in quam iusto enim laborum sed ab non alias architecto commodi ipsa, nam pariatur est facilis sint corrupti. Officiis qui quaerat voluptatem quidem expedita nihil sapiente dolore illum dolorum ex. Facilis tenetur vitae corporis voluptate dolor sint perspiciatis expedita in nihil, vel rerum sunt ducimus eum maiores mollitia autem repellat delectus sapiente nulla natus officiis ipsa. Repudiandae non fugiat sed blanditiis esse necessitatibus cum iure perferendis nostrum?
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item shadow-none border-0">
                            <h2 class="accordion-header">
                                <button class="px-0 accordion-button border-0 shadow-none fw-bolder" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-pemasok" aria-expanded="true" aria-controls="collapse-pemasok">
                                    Pemasokk Bahan
                                </button>
                            </h2>
                            <div id="collapse-pemasok" class="accordion-collapse collapse" data-bs-parent="#product-accordion">
                                <div class="accordion-body border-0">
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aperiam exercitationem laudantium in dolor, assumenda natus beatae fuga ratione delectus odio. Officia culpa, nihil aperiam illum suscipit accusantium porro animi maxime eum omnis qui eos ut excepturi quod mollitia aliquid quia quisquam quam consequatur quae quaerat veritatis iusto quos vitae! At, quae? Soluta harum, ipsum quos eum voluptate possimus iste adipisci ipsam molestias ea aspernatur tenetur suscipit consectetur autem quo magni dicta, sunt vitae qui modi! Eligendi, possimus esse voluptatibus placeat temporibus iure iste aperiam aliquam, omnis et quisquam sequi accusantium labore autem iusto adipisci praesentium velit cumque facilis laudantium voluptates vero. Quod quae exercitationem incidunt blanditiis nulla labore neque voluptatum, ab, voluptatibus inventore, ipsam necessitatibus! Tempora in quaerat fugiat molestiae amet eaque accusantium? Nisi sequi necessitatibus molestiae repellat unde a voluptatum laborum dignissimos qui. Iste repellendus ullam autem sapiente voluptas est saepe harum natus consequuntur eaque nemo, doloremque aliquam facere praesentium. Quasi dolore ipsa voluptatibus, nulla nam harum mollitia sed tempora impedit. Ipsum, velit aut nulla excepturi voluptatibus dolorum sequi, cupiditate ratione assumenda id dicta eaque consectetur aperiam, veritatis eos tenetur quo recusandae? Iure aut molestias earum optio voluptas in quam iusto enim laborum sed ab non alias architecto commodi ipsa, nam pariatur est facilis sint corrupti. Officiis qui quaerat voluptatem quidem expedita nihil sapiente dolore illum dolorum ex. Facilis tenetur vitae corporis voluptate dolor sint perspiciatis expedita in nihil, vel rerum sunt ducimus eum maiores mollitia autem repellat delectus sapiente nulla natus officiis ipsa. Repudiandae non fugiat sed blanditiis esse necessitatibus cum iure perferendis nostrum?
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item shadow-none border-0">
                            <h2 class="accordion-header">
                                <button class="px-0 accordion-button border-0 shadow-none fw-bolder" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-pengiriman" aria-expanded="true" aria-controls="collapse-pengiriman">
                                    Pengiriman dan Pengembalian
                                </button>
                            </h2>
                            <div id="collapse-pengiriman" class="accordion-collapse collapse" data-bs-parent="#product-accordion">
                                <div class="accordion-body border-0">
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aperiam exercitationem laudantium in dolor, assumenda natus beatae fuga ratione delectus odio. Officia culpa, nihil aperiam illum suscipit accusantium porro animi maxime eum omnis qui eos ut excepturi quod mollitia aliquid quia quisquam quam consequatur quae quaerat veritatis iusto quos vitae! At, quae? Soluta harum, ipsum quos eum voluptate possimus iste adipisci ipsam molestias ea aspernatur tenetur suscipit consectetur autem quo magni dicta, sunt vitae qui modi! Eligendi, possimus esse voluptatibus placeat temporibus iure iste aperiam aliquam, omnis et quisquam sequi accusantium labore autem iusto adipisci praesentium velit cumque facilis laudantium voluptates vero. Quod quae exercitationem incidunt blanditiis nulla labore neque voluptatum, ab, voluptatibus inventore, ipsam necessitatibus! Tempora in quaerat fugiat molestiae amet eaque accusantium? Nisi sequi necessitatibus molestiae repellat unde a voluptatum laborum dignissimos qui. Iste repellendus ullam autem sapiente voluptas est saepe harum natus consequuntur eaque nemo, doloremque aliquam facere praesentium. Quasi dolore ipsa voluptatibus, nulla nam harum mollitia sed tempora impedit. Ipsum, velit aut nulla excepturi voluptatibus dolorum sequi, cupiditate ratione assumenda id dicta eaque consectetur aperiam, veritatis eos tenetur quo recusandae? Iure aut molestias earum optio voluptas in quam iusto enim laborum sed ab non alias architecto commodi ipsa, nam pariatur est facilis sint corrupti. Officiis qui quaerat voluptatem quidem expedita nihil sapiente dolore illum dolorum ex. Facilis tenetur vitae corporis voluptate dolor sint perspiciatis expedita in nihil, vel rerum sunt ducimus eum maiores mollitia autem repellat delectus sapiente nulla natus officiis ipsa. Repudiandae non fugiat sed blanditiis esse necessitatibus cum iure perferendis nostrum?
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

@endpush

@push('style')
    
@endpush