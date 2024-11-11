@push('script')
    @if(session()->has('success'))
        <script>
            $(document).ready(function(){
                Swal.fire({
                    icon: 'success',
                    title: "{{ session('success') }}",
                    toast: true,
                    position: 'top-end',
                    timer: 3000,
                    showConfirmButton: false,
                    timerProgressBar: true,
                })
            })
        </script>
    @endif
@endpush