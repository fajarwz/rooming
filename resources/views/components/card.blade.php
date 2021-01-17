<div class="card">
  @if($card_header == 'true')
    <div class="card-header @isset($card_header_class) {{ $card_header_class }} @endisset">
      {{ $card_header_content }}
    </div>
  @endif

  <div class="card-body">

    {{ $card_body_content }}
    
  </div>

  @if($card_footer == 'true')
    <div class="card-footer @isset($card_footer_class) {{ $card_footer_class }} @endisset">
      {{ $card_footer_content }}
    </div>
  @endif
</div>