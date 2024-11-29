<div class="modal fade" id="modal-detail-category" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Kategori</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-4">
                        <img id="category-img" src="{{ asset('dist/images/profile/user-1.jpg') }}" alt="" class="w-100 rounded object-fit-cover" style="aspect-ratio: 1/1">
                    </div>
                    <div class="col-8">
                        <h5 class="fw-bolder" id="category-name">Nama Kategori</h5>
                        <p id="category-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure laboriosam ab, aut sequi rerum sed necessitatibus esse placeat ex hic commodi alias accusamus nihil ipsa.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.btn-detail-category', function() {

                const category = $(this).data('data')
                $('#modal-detail-category #category-img').attr('src', '{{ asset("storage") }}/'+category.image)
                $('#modal-detail-category #category-name').text(category.name)
                $('#modal-detail-category #category-desc').text(category.desc)
            })
        })
    </script>
@endpush