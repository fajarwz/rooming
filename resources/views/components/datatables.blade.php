<div class="row">
  <div class="col-12">
    <div class="card">
      @if(isset($card_header) && $card_header == 'true')
      <div class="card-header @isset($card_header_class) {{ $card_header_class }} @endisset">
        {{ $card_header_content }}
      </div>
      @endif
      <div class="card-body">

        @isset($buttons)
          <div id="buttons" class="buttons @isset($buttons_class) {{ $buttons_class }} @endisset">
            {{ $buttons }}
          </div>
        @endisset
        
        <div class="table-responsive">
          <table class="table table-striped display nowrap w-100" data-scroll-y="400" id="{{ $table_id }}">
            <thead>
              {{ $table_header }}
            </thead>
            
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@push('after-style')
  @include('includes.datatables-styles')
@endpush

@push('after-script')
  @include('includes.datatables-scripts')

  <script>
    let div = $(" [href]", document.getElementById("buttons"));
    let add_link = div.attr("href");

    $.extend(true, $.fn.dataTable.defaults, {
      columnDefs: {
        targets: '_all',
        defaultContent: '-'
      },
      stateSave: true,
      scrollX: true,
      scrollCollapse: true,
      language: {
        url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Indonesian.json",
        emptyTable: '<div class="empty-state" data-height="300" style="height: 300px;">'
                    + '<div class="empty-state-icon">'
                    + '<i class="fas fa-question"></i>'
                    +  '</div>'
                    +  '<h2>Tidak dapat menemukan data apapun</h2>'
                    +  '<p class="lead">'
                    +   'Mohon maaf tidak ada data apapun, untuk menghilangkan pesan ini buat setidaknya 1 data.'
                    +  '</p>'
                    + `<a href=${add_link} class="btn btn-primary mt-4">Buat Data Baru</a>`
                    + '</div>',
      },
      // responsive: {
      //     details: {
      //         display: $.fn.dataTable.Responsive.display.childRowImmediate,
      //         type: 'none',
      //         target: ''
      //     }
      // }
    });
  </script>

@endpush