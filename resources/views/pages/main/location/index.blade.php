@extends('layouts.main.index')

@section('subtitle', 'Lokasi')

@section('content')
    <div
        style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('dist/images/backgrounds/auth-page-bg.png') }}'); background-position: center; background-size: cover; width: 100%; height: 300px; display: grid; place-content: center;">
        <h1 class="text-white">Lokasi</h1>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-6">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.5026833583547!2d112.61124997937628!3d-7.946891171649552!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78827687d272e7%3A0x789ce9a636cd3aa2!2sPoliteknik%20Negeri%20Malang!5e0!3m2!1sid!2sid!4v1733122598791!5m2!1sid!2sid"
                    height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade" class="w-100 rounded shadow"></iframe>
            </div>
            <div class="col-lg-6">
                <div>
                    <div class="mb-3 d-flex justify-content-between align-items-end">
                        <h4 class="fw-bolder m-0">Toko MFashion</h4>
                        <span class="badge bg-light-danger text-danger">Tutup</span>
                    </div>
                    <div>
                        <div class="fs-4">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nam, ipsam corrupti! Ipsa possimus perspiciatis architecto odio? Velit aliquid quae fugit minus quisquam corrupti sunt odio!</div>
                        <p class="fs-4 mb-2">0812-1237-1234</p>
                        <div>
                            <h5 class="mb-0 fs-4 fw-semibold">Jam Buka Toko</h5>
                            <ul>
                                <li>Weekday 09:00 - 18:00</li>
                                <li>Weekend 10:00 - 18:00</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('style')
    <style>
        .nav-link.active {
            background-color: var(--bs-dark) !important;
            color: var(--bs-light) !important
        }
    </style>
@endpush
