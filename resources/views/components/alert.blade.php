
    <!-- It is never too late to be what you might have been. - George Eliot -->
    @if (session('info'))
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: '{{ session('info') }}',
        showConfirmButton: false,
        timer: 4500
        })
    </script>    
    @endif
    @if (session('error'))
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'error',
        title: '{{ session('error') }}',
        showConfirmButton: false,
        timer: 4500
        })
    </script>    
    @endif
