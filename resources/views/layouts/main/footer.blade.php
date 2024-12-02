<footer class="bg-white p-5">
    <div class="row mx-auto justify-content-center container gap-2">
        <div class="col-12 col-md-4 col-lg">
            <h6 class="fw-bolder mb-2">Informasi</h6>
            <div class="fw-semibold d-flex flex-column gap-1">
                <a href="/about" class="text-body">Tentang MFashion</a>
                <a href="/csr" class="text-body">CSR</a>
                {{-- <div>Sustainability</div> --}}
                <a href="/contact-us" class="text-body">Hubungi Kami</a>
                <a href="/location" class="text-body">Lokasi Toko</a>
            </div>
        </div>
        <div class="col-12 col-md-4 col-lg">

            <h6 class="fw-bolder mb-2">Bantuan dan Dukungan</h6>
            <div class="fw-semibold d-flex flex-column gap-1">
                <div>Lacak Pesanan Saya</div>
                <div>Pengembalian Barang dan Dana</div>
                <div>Syarat dan Ketentuan</div>
                <div>Kebijakan Privasi</div>
                <div>FAQ</div>
            </div>
        </div>
        <div class="col-12 col-md-3 col-lg">
            <h6 class="fw-bolder mb-2 text-start text-lg-center">Metode Pembayaran</h6>
            <div>

                <div style="display: grid; grid-template-columns: repeat(2, 110px);">
                    <div style="height: 40px" class="mb-2">
                        <img src="{{ asset('dist/images/icons/BCA.png') }}" alt="" class="img-fluid" style="max-height: 40px">
                    </div>
                    <div style="height: 40px" class="mb-2">
                        <img src="{{ asset('dist/images/icons/Mandiri.png') }}" alt="" class="img-fluid" style="max-height: 40px">
                    </div>
                    <div style="height: 40px" class="mb-2">
                        <img src="{{ asset('dist/images/icons/BRI.png') }}" alt="" class="img-fluid" style="max-height: 40px">
                    </div>
                    <div style="height: 40px" class="mb-2">
                        <img src="{{ asset('dist/images/icons/BSI.png') }}" alt="" class="img-fluid" style="max-height: 40px">
                    </div>
                    <div style="height: 40px" class="mb-2">
                        <img src="{{ asset('dist/images/icons/spay.png') }}" alt="" class="img-fluid" style="max-height: 40px">
                    </div>
                    <div style="height: 40px" class="mb-2">
                        <img src="{{ asset('dist/images/icons/gopay.png') }}" alt="" class="img-fluid" style="max-height: 40px">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-3 col-lg">
            <h6 class="fw-bolder mb-2 text-start text-md-center">Tersedia Di</h6>
            <div>
                <div class="d-flex flex-column align-items-start align-items-md-center">
                    <img src="{{ asset('dist/images/icons/tokopedia.png') }}" alt="" class="object-fit-cover mb-1" height="60">
                    <img src="{{ asset('dist/images/icons/shopee.png') }}" alt="" class="object-fit-cover mb-1" height="60">
                </div>
            </div>
        </div>
        <div class="col-12 col-md-3 col-lg">
            <h6 class="fw-bolder mb-2 text-start text-lg-center">Temukan Kami</h6>
            <div>
                <div class="d-flex align-items-center justify-content-start justify-content-md-center gap-2 mb-2">
                    <img src="{{ asset('dist/images/icons/x.png') }}" alt="" width="40">
                    <img src="{{ asset('dist/images/icons/whatsapp.png') }}" alt="" width="40">
                    <img src="{{ asset('dist/images/icons/facebook.png') }}" alt="" width="40">
                    <img src="{{ asset('dist/images/icons/instagram.png') }}" alt="" width="40">
                </div>
                <div class="d-flex flex-column justify-content-center align-items-start align-items-md-center">
                    <img src="{{ asset('dist/images/icons/playstore.png') }}" alt="" class="object-fit-cover mb-1" height="60">
                    <img src="{{ asset('dist/images/icons/appstore.png') }}" alt="" class="object-fit-cover mb-1" height="60">
                </div>
            </div>
        </div>
    </div>
</footer>