@extends('layouts.admin.index')

@section('subtitle', 'Brand')

@section('content')
    @include('components.alerts.index')
    <div class="d-flex align-items-end justify-content-between mb-2">
        <h2 class="fw-bolder mb-0">Brand</h2>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-create-brand">+ Tambah</button>
    </div>
    @include('pages.admin.brands.widgets.index-table-brand')
    @include('pages.admin.brands.widgets.index-modal-create-brand')
    @include('pages.admin.brands.widgets.index-modal-edit-brand')

    <x-delete-form />
@endsection

@push('script')
    <script src="{{ asset('dist/libs/datatables/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            
            // update action 
            $(document).on('click', '.btn-edit', function() {
                var data = $(this).data('data');
                $('#modal-edit-brand').find('input[name="name"]').val(data.name);
                $('#modal-edit-brand').find('form').attr('action', `{{ route('admin.brands.update', ':id') }}`.replace(':id', data.id));
            })

            // delete action 
            $(document).on('click', '.btn-delete-brand', function() {
                Swal.fire({
                    icon: 'question',
                    title: 'Apakah anda yakin?',
                    text: 'Data brand akan dihapus!',
                    showCancelButton: true,
                    cancelButtonText: 'Batal',
                    confirmButtonText: 'Yakin',
                }).then((result) => {
                    if (result.isConfirmed) {
                        var data = $(this).data('data');
                        $('#delete-form').attr('action', `{{ route('admin.brands.destroy', ':id') }}`.replace(':id', data.id));
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