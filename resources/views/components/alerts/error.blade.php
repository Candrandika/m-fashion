@push('script')
    @if(session()->has('error'))
        <script>
            $(document).ready(function(){
                Swal.fire({
                    icon: 'error',
                    title: "{{ session('error') }}",
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