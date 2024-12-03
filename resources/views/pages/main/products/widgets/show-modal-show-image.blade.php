<div class="modal modal-lg fade" id="modal-show-image" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Gambar Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
            </div>
            <div class="modal-body">
                <img src="" alt="Gambar Produk" style="min-height: 100px; width: 100%">
            </div>
        </div>
    </div>
</div>

@push('script')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.btn-show-image', function() {
                let src = $(this).attr('src');
                let data = $(this).data('img')

                $('#modal-show-image img').attr('src', src);
                $('#modal-show-image').modal('show');
            });
        })
    </script>
@endpush
