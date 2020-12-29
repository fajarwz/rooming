@foreach (['update', 'add', 'delete'] as $msg)
    @if(Session::has('alert-success-'.$msg))
        @push('after-script')
            {{-- bootstrap-notify  --}}
            <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>

            <script>
                iziToast.success({
                    title: 'Sukses!',
                    message: '{{ Session::get('alert-success-'.$msg) }}',
                    position: 'topRight'
                });
            </script>

        @endpush  
    @endif
@endforeach