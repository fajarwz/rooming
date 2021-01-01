@if(Session::has('alert-success') || Session::has('alert-failed'))
    @push('after-style')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">
    @endpush
    @push('after-script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
        @if (Session::has('alert-success'))
            <script>
                iziToast.success({
                    title: 'Sukses!',
                    message: '{{ Session::get('alert-success') }}',
                    position: 'topRight'
                });
            </script>
        @else
        <script>
            iziToast.error({
                title: 'Gagal!',
                message: '{{ Session::get('alert-failed') }}',
                position: 'topRight'
            });
        </script>
        @endif
    @endpush
@endif