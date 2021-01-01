@push('after-style')
  <link rel="stylesheet" href="{{ asset('theme/chocolat/dist/css/chocolat.css') }}">
@endpush

@push('after-script')
  <script src="{{ asset('theme/chocolat/dist/js/chocolat.js') }}"></script>    

  <script>
    if(jQuery().Chocolat) { 
      $(".gallery").Chocolat({
        className: 'gallery',
        imageSelector: '.gallery-item',
      });
    }

    if($('.chocolat-parent').length && jQuery().Chocolat) {
      $('.chocolat-parent').Chocolat();
    }
  </script>
@endpush
