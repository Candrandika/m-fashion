<div class="modal fade" id="modal-show-image" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Gambar / Banner Diskon</h5>
                <button type="button" data-bs-dismiss="modal" class="btn-close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <img src="" alt="banner" class="w-100">
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.btn-show-image', function() {
                let image = $(this).data('image');
                $('#modal-show-image img').attr('src', image);
            })
        })
    </script>
@endpush