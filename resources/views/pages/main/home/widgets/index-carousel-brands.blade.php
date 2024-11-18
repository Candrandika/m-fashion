<div id="carousel-heroes" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div style="background-image: url('https://placehold.co/500x200'); height: 400px; background-size: cover; background-position: center;" class="rounded-5 d-flex flex-column align-items-center justify-content-center gap-5">
                <h1 class="text-white fs-13 fw-bolder m-0">Tingkatkan Penampilanmu Disini</h1>
                <button class="btn btn-light">Selengkapnya</button>
            </div>
        </div>
    </div>
</div>

<div class="owl_carousel">
    <div class="bg-light-primary p-3">a</div>
    <div class="bg-light-primary p-3">a</div>
    <div class="bg-light-primary p-3">a</div>
    <div class="bg-light-primary p-3">a</div>
</div>

@push('script')
<script src="{{ asset('dist/libs/owl.carousel/dist/owl.carousel.min.js') }}"></script>
<script>
    $('.owl_carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: false,
    })
</script>
@endpush
@push('style')
<link rel="stylesheet" href="{{ asset('dist/libs/owl.carousel/dist/assets/owl.carousel.min.css') }}">
@endpush