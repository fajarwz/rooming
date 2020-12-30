<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">

        @isset($add_button)
          <div class="buttons">
            {{ $add_button }}
          </div>
        @endisset
        
        <div class="table-responsive">
          <table class="table table-striped w-100" id="{{ $table_id }}">
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
    $.extend(true, $.fn.dataTable.defaults, {
      columnDefs: {
        targets: '_all',
        defaultContent: '-'
      },
      stateSave: true,
      scrollX: true,
      scrollY: "400px",
      scrollCollapse: true,
      language: {
        url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Indonesian.json"
      },
      responsive: true
    });
  </script>

@endpush