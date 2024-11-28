@extends('layouts.admin.index')

@section('subtitle', 'Produk')

@section('content')
    @include('components.alerts.index')
    <div class="d-flex align-items-end justify-content-between mb-2">
        <h2 class="fw-bolder mb-0">Produk</h2>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-create-product">+ Tambah</button>
    </div>
    @include('pages.admin.products.widgets.index-table-product')
    @include('pages.admin.products.widgets.index-modal-create-product')
    @include('pages.admin.products.widgets.index-modal-edit-product')

    <x-delete-form />
@endsection

@push('script')
    <script src="{{ asset('dist/libs/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('dist/libs/quill/dist/quill.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            
            // update action 
            $(document).on('click', '.btn-edit', function() {
                var data = $(this).data('data');
                $('#modal-edit-product').find('input[name="name"]').val(data.name);
                $('#modal-edit-product').find('input[name="desc"]').val(data.desc);

                const barndOptions = $('#modal-edit-product').find('select[name="brand_id"] option');
                barndOptions.each(function() {
                    if (this.value == data.brand_id) {
                        $(this).attr('selected', 'selected');
                    }
                });

                const categoryOptions = $('#modal-edit-product').find('select[name="category_id"] option');
                categoryOptions.each(function() {
                    if (this.value == data.category_id) {
                        $(this).attr('selected', 'selected');
                    }
                });

                $('#modal-edit-product').find('form').attr('action', `{{ route('admin.products.update', ':id') }}`.replace(':id', data.id));
            })

            // delete action 
            $(document).on('click', '.btn-delete-product', function() {
                Swal.fire({
                    icon: 'question',
                    title: 'Apakah anda yakin?',
                    text: 'Data produk akan dihapus!',
                    showCancelButton: true,
                    cancelButtonText: 'Batal',
                    confirmButtonText: 'Yakin'
                }).then((result) => {
                    if (result.isConfirmed) {
                        var data = $(this).data('data');
                        $('#delete-form').attr('action', `{{ route('admin.products.destroy', ':id') }}`.replace(':id', data.id));
                        $('#delete-form').submit();
                    }
                });
            })
        })
    </script>
@endpush

@push('script')
    <link rel="stylesheet" href="{{ asset('dist/libs/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/libs/quill/dist/quill.snow.css') }}">
@endpush