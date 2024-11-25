@extends('layouts.admin.index')

@section('subtitle', 'Kategori Produk')

@section('content')
    @include('components.alerts.index')
    <div class="d-flex align-items-end justify-content-between mb-2">
        <h2 class="fw-bolder mb-0">Kategori Produk</h2>
        <button data-bs-toggle="modal" data-bs-target="#modal-create-category" class="btn btn-primary" type="button">+ Tambah</button>
    </div>
    @include('pages.admin.product-categories.widgets.index-table-category')
    @include('pages.admin.product-categories.widgets.index-modal-create')
    @include('pages.admin.product-categories.widgets.index-modal-edit')
    @include('pages.admin.product-categories.widgets.index-modal-detail')

    <x-delete-form />
@endsection

@push('script')
    <script src="{{ asset('dist/libs/datatables/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {

            // update action 
            $(document).on('click', '.btn-edit', function() {
                var data = $(this).data('data');
                console.log(data);
                $('#modal-edit-category').find('input[name="name"]').val(data.name);
                $('#modal-edit-category').find('input[name="desc"]').val(data.desc);
                $('#modal-edit-category').find('form').attr('action', `{{ route('admin.product-categories.update', ':id') }}`.replace(':id', data.id));
            })

            // delete action 
            $(document).on('click', '.btn-delete-category', function() {
                Swal.fire({
                    icon: 'question',
                    title: 'Apakah anda yakin?',
                    text: 'Data kategori akan dihapus!',
                    showCancelButton: true,
                    cancelButtonText: 'Batal',
                    confirmButtonText: 'Yakin'
                }).then((result) => {
                    if (result.isConfirmed) {
                        var data = $(this).data('data');
                        $('#delete-form').attr('action', `{{ route('admin.product-categories.destroy', ':id') }}`.replace(':id', data.id));
                        $('#delete-form').submit();
                    }
                });
            })
        })
    </script>
@endpush
@push('script')
    <link rel="stylesheet" href="{{ asset('dist/libs/datatables/datatables.min.css') }}">
@endpush