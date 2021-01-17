<div class="row @isset($row_class) {{ $row_class }} @endisset">
  <div class="col @isset($col_class) {{ $col_class }} @endisset">
    <div class="card">
      <form method='{{ $form_method }}'
        @if (isset($update_id))
          action='{{ route($form_action, $update_id) }}'  
        @else 
          action='{{ route($form_action) }}'
        @endif
        
        @if(isset($is_form_with_file) && $is_form_with_file == 'true')
          enctype='multipart/form-data'
        @endif
        >

        @csrf
        @isset($method) @method($method) @endisset

        @if (isset($card_header) && $card_header == 'true')
        <div class="card-header @isset($card_header_class) {{ $card_header_class }} @endisset">
          {{ $card_header_content }}
        </div>
        @endif

        <div class="card-body">
          {{ $input_form }}
        </div>

        @if (isset($card_footer) && $card_footer == 'true')
        <div class="card-footer @isset($card_footer_class) {{ $card_footer_class }} @endisset">
          {{ $card_footer_content }}
        </div>
        @endif

      </form>
    </div>
    
  </div>
</div>