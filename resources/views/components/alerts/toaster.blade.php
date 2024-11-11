@push('script')
    <script>
        function Toaster(icon, text) {
            Swal.fire({
                icon: icon,
                title: text,
                toast: true,
                position: 'top-end',
                timer: 3000,
                showConfirmButton: false,
                timerProgressBar: true,
            })
        }
    </script>
@endpush