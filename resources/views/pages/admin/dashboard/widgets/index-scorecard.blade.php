<div class="row">
    <div class="col-12 col-xxl-8">
        <div class="card position-relative bg-primary overflow-hidden">
            <div class="card-body">
                <div class="card-title h5 text-light">Hai, {{ auth()->user()?->name }}</div>
                <div class="h1 mb-0 fw-bolder text-light">Selamat Datang Kembali</div>
            </div>
            <div class="position-absolute d-none d-sm-block" style="right: 20px; bottom: 0px;"><img src="{{ asset('dist/images/backgrounds/piggy.png') }}" alt="" width="150px"></div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-xxl-4">
        <div class="card position-relative bg-light-primary overflow-hidden">
            <div class="card-body">
                <div class="card-title h5 text-primary">Jumlah Transaksi</div>
                <div class="h1 mb-0 fw-bolder text-primary">128</div>
            </div>
            <div class="position-absolute text-muted opacity-25" style="font-size: 10rem; right: 0px; top: -20px;"><i class="ti ti-shopping-cart"></i></div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-xxl-4">
        <div class="card position-relative bg-light-success overflow-hidden">
            <div class="card-body">
                <div class="card-title h5 text-success">Total Pendapatan</div>
                <div class="h1 mb-0 fw-bolder text-success">Rp 712.123</div>
            </div>
            <div class="position-absolute text-muted opacity-25" style="font-size: 10rem; right: 0px; top: -20px;"><i class="ti ti-wallet"></i></div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-xxl-4">
        <div class="card position-relative overflow-hidden bg-light-warning">
            <div class="card-body">
                <div class="card-title h5 text-warning">Jumlah Produk</div>
                <div class="h1 mb-0 fw-bolder text-warning">20</div>
            </div>
            <div class="position-absolute text-muted opacity-25" style="font-size: 10rem; right: 0px; top: -20px;"><i class="ti ti-box"></i></div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-xxl-4">
        <div class="card position-relative overflow-hidden bg-light-secondary">
            <div class="card-body">
                <div class="card-title h5 text-secondary">Jumlah Pengguna</div>
                <div class="h1 mb-0 fw-bolder text-secondary">20</div>
            </div>
            <div class="position-absolute text-muted opacity-25" style="font-size: 10rem; right: 0px; top: -20px;"><i class="ti ti-users"></i></div>
        </div>
    </div>
</div>