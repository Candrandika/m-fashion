<section id="brand-carousels">
    <h4 class="fw-bolder">Brand</h4>
    <div class="owl-carousel counter-carousel owl-theme">
        @foreach ($brands as $brand)
        <div class="item">
            <img src="{{ asset('storage/' . $brand->image) }}" class="rounded-5 shadow-sm" alt="" style="width: 150px; height: 150px; object-fit; cover;">
        </div>
        @endforeach
    </div>
</section>

@push('style')
    <link rel="stylesheet" href="{{ asset('dist/libs/owl.carousel/dist/assets/owl.carousel.min.css') }}">
@endpush

@push('script')
    <script src="{{ asset('dist/libs/owl.carousel/dist/owl.carousel.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.counter-carousel').owlCarousel({
                loop: true,
                autoplay: true,
                responsive: {
                    0: {
                        items: 2
                    },
                    576: {
                        items: 3
                    },
                    768: {
                        items: 4
                    },
                    992: {
                        items: 6
                    },
                    1200: {
                        items: 7
                    },
                }
            })

        })
    </script>
@endpush
