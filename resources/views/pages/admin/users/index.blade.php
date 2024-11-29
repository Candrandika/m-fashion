@extends('layouts.admin.index')

@section('subtitle', 'Pengguna')

@section('content')
    @include('components.alerts.index')
    <div class="d-flex align-items-end justify-content-between mb-2">
        <h2 class="fw-bolder mb-0">Pengguna</h2>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-create-user">+ Tambah Admin</button>
    </div>
    @include('pages.admin.users.widgets.index-table-user')
    @include('pages.admin.users.widgets.index-modal-create')
    @include('pages.admin.users.widgets.index-modal-edit')

    <x-delete-form />
@endsection

@push('script')
    <script src="{{ asset('dist/libs/datatables/datatables.min.js') }}"></script>
        
    <script>
         $(document).ready(function() {
            
            // update action 
            $(document).on('click', '.btn-edit', function() {
                var data = $(this).data('data');
                $('#modal-edit-user').find('input[name="name"]').val(data.name);
                $('#modal-edit-user').find('input[name="email"]').val(data.email);
                $('#modal-edit-user').find('input[name="phone"]').val(data.phone);

                $('#modal-edit-user').find('form').attr('action', `{{ route('admin.users.update', ':id') }}`.replace(':id', data.id));
            })

            // delete action 
            $(document).on('click', '.btn-delete-user', function() {
                Swal.fire({
                    icon: 'question',
                    title: 'Apakah anda yakin?',
                    text: 'Data user akan dihapus!',
                    showCancelButton: true,
                    cancelButtonText: 'Batal',
                    confirmButtonText: 'Yakin'
                }).then((result) => {
                    if (result.isConfirmed) {
                        var data = $(this).data('data');
                        $('#delete-form').attr('action', `{{ route('admin.users.destroy', ':id') }}`.replace(':id', data.id));
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