@extends('layouts.main')

@section('title', 'Booking List - ROOMING')

@section('header-title', 'Booking List')
    
@section('breadcrumbs')
  <div class="breadcrumb-item"><a href="#">Transaksi</a></div>
  <div class="breadcrumb-item active">Booking List</div>
@endsection

@section('section-title', 'Booking List')
    
@section('section-lead')
  Berikut ini adalah daftar seluruh booking dari setiap user.
@endsection

@section('content')

  @component('components.datatables')
    
    @slot('table_id', 'booking-list-table')

    @slot('table_header')
      <tr>
        <th>#</th>
        <th>Foto</th>
        <th>Ruangan</th>
        <th>User</th>
        <th>Tanggal</th>
        <th>Waktu Mulai</th>
        <th>Waktu Selesai</th>
        <th>Keperluan</th> 
        <th>Status</th> 
      </tr>
    @endslot
      
  @endcomponent

@endsection

@push('after-script')
<script src="//cdn.datatables.net/plug-ins/1.10.22/dataRender/ellipsis.js"></script>

  <script>
  $(document).ready(function() {
    $('#booking-list-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: '{{ route('booking-list.json') }}',
      columnDefs: [ 
        {
            targets: [ 4 ],
            orderData: [ 4, 5 ]
        }, 
        {
            targets: [ 5 ],
            orderData: [ 5, 4 ]
        }, 
        {
          targets: 7,
          render: $.fn.dataTable.render.ellipsis( 20, true )
        } ,
      ],
      order: [[4, 'desc'], [5, 'desc']],
      columns: [
      {
        name: 'DT_RowIndex',
        data: 'DT_RowIndex',
        orderable: false, 
        searchable: false,
      },
      {
        name: 'room.photo',
        data: 'room.photo',
        orderable: false, 
        searchable: false,
        render: function ( data, type, row ) {
          if(data != null) {
            return `<div class="gallery gallery-fw">`
              + `<a href="{{ asset('storage/${data}') }}" data-toggle="lightbox">`
              + `<img src="{{ asset('storage/${data}') }}" class="img-fluid" style="min-width: 80px; height: auto;">`
              + `</a>`
            + '</div>';
          } else {
            return '-'
          }
        }
      },
      {
        name: 'room.name',
        data: 'room.name',
        orderable: false, 
        render: function ( data, type, row ) {
          var result = data;

          var now = new Date();

          var data_year = (row.date).substring(0, 4);
          var data_month = (row.date).substring(5, 7);
          var data_date = (row.date).substring(8);

          var data_start_time_hours = (row.start_time).substring(0, 2);
          var data_start_time_minutes = (row.start_time).substring(3, 5);

          var data_full_time = new Date(data_year, data_month-1, data_date, data_start_time_hours, data_start_time_minutes);

          var is_touch_device = 'ontouchstart' in window || navigator.msMaxTouchPoints;

          if (is_touch_device) {
            result += '<div>';
          } else {
            result += '<div class="table-links">';
          }

          if(data_full_time > now) {
            if(row.status === 'PENDING' || row.status === 'DITOLAK') {
              result += ' <a href="javascript:;" data-id="'+row.id+'" '
              + ' data-title="Setujui"'
              + ' data-body="Yakin setujui booking ini?"'
              + ' data-value="1"'
              + ' class="text-primary"'
              + ' id="acc-btn"'
              + ' name="acc-btn">Setujui'
              + ' </a>';
            }
          }

          if(row.status === 'PENDING') {
            result += '<div class="bullet"></div>';
          }

          if(row.status === 'PENDING' || row.status === 'DISETUJUI') {
            result += ' <a href="javascript:;" data-id="'+row.id+'" '
            + ' data-title="Tolak"'
            + ' data-body="Yakin tolak booking ini?"'
            + ' data-value="0"'
            + ' class="text-danger"'
            + ' id="deny-btn"'
            + ' name="deny-btn">Tolak'
            + ' </a>';
            + '<div class="bullet"></div>';
          }

          + '</div>';

          return result;
            
        }
      },
      {
        name: 'user.name',
        data: 'user.name',
        orderable: false, 
      },
      {
        name: 'date',
        data: 'date',
      },
      {
        name: 'start_time',
        data: 'start_time',
      },
      {
        name: 'end_time',
        data: 'end_time', 
      },
      {
        name: 'purpose',
        data: 'purpose',
      },
      {
        name: 'status',
        data: 'status',
        render: function ( data, type, row ) {
          var result = `<span class="badge badge-`;

          if(data === 'PENDING') 
            result += `info`;
          else if(data === 'DISETUJUI')
            result += `primary`;
          else if(data === 'DIGUNAKAN')
            result += `primary`;
          else if(data === 'DITOLAK')
            result += `danger`;
          else if(data === 'EXPIRED')
            result += `warning`;
          else if(data === 'BATAL')
            result += `warning`;
          else if(data === 'SELESAI')
            result += `success`;

          result += `">${data}</span>`;

          return result;
        } 
      },
    ],
    });

    $(document).on('click', '#acc-btn, #deny-btn', function() {
      var id    = $(this).data('id'); 
      var title = $(this).data('title');
      var body  = $(this).data('body');
      var value = $(this).data('value');

      var submit_btn_class = (value === 1) ? 'btn btn-primary' : 'btn btn-danger';

      $('.modal-title').html(title);
      $('.modal-body').html(body);
      $('#confirm-form').attr('action', '/admin/booking-list/'+id+'/update/'+value);
      $('#confirm-form').attr('method', 'POST');
      $('#submit-btn').attr('class', submit_btn_class);
      $('#lara-method').attr('value', 'put');
      $('#confirm-modal').modal('show');
    });

    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox();
    });
  });

</script>

@include('includes.lightbox')

@include('includes.notification')

@include('includes.confirm-modal')

@endpush