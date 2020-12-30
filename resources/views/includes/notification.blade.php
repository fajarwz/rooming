@foreach (['update', 'add', 'delete'] as $msg)
    @push('after-script')
        {{-- bootstrap-notify  --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>

        @if(Session::has('alert-success-'.$msg))
        <script>
            iziToast.success({
                title: 'Sukses!',
                message: '{{ Session::get('alert-success-'.$msg) }}',
                position: 'topRight'
            });
        </script>
        @elseif(Session::has('alert-failed-'.$msg))
        <script>
            iziToast.error({
                title: 'Gagal!',
                message: '{{ Session::get('alert-success-'.$msg) }}',
                position: 'topRight'
            });
        </script>
        @endif

    @endpush  
@endforeach