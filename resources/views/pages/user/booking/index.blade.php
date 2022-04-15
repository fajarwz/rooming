@extends('layouts.main')

@section('title', 'My Booking List - ROOMING')

@section('header-title', 'My Booking List')
    
@section('breadcrumbs')
  <div class="breadcrumb-item"><a href="#">Transaksi</a></div>
  <div class="breadcrumb-item active">My Booking List</div>
@endsection

@section('section-title', 'My Booking List')
    
@section('section-lead')
  Berikut ini adalah daftar seluruh booking yang pernah kamu buat.
@endsection

@section('content')

  @component('components.datatables')

    @slot('buttons')
      <a href="{{ route('my-booking-list.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i>&nbsp;Booking</a>
    @endslot
    
    @slot('table_id', 'my-booking-list-table')

    @slot('table_header')
      <tr>
        <th>#</th>
        <th>Foto</th>
        <th>Ruangan</th>
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

    $('#my-booking-list-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: '{{ route('my-booking-list.json') }}',
      columnDefs: [ 
        {
            targets: [ 3 ],
            orderData: [ 3, 4 ]
        }, 
        {
            targets: [ 4 ],
            orderData: [ 4, 3 ]
        },
        {
          targets: 6,
          render: $.fn.dataTable.render.ellipsis( 20, true )
        }, 
      ],
      order: [[3, 'desc'], [4, 'desc']],
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
        render: function ( data, type, row ) {
          var result = data;

          var is_touch_device = 'ontouchstart' in window || navigator.msMaxTouchPoints;

          if (is_touch_device) {
            result += '<div>';
          } else {
            result += '<div class="table-links">';
          }
        
          if(row.status === 'PENDING' || row.status === 'DISETUJUI') {
            result += ' <a href="javascript:;" data-id="'+row.id+'" '
            + ' data-title="Batalkan"'
            + ' data-body="Yakin batalkan booking ini?"'
            + ' class="text-danger"'
            + ' id="cancel-btn"'
            + ' name="cancel-btn">Batalkan'
            + ' </a>';
          }

          + '</div>';

          return result;
            
        }
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

    $(document).on('click', '#cancel-btn', function() {
      var id    = $(this).data('id'); 
      var title = $(this).data('title');
      var body  = $(this).data('body');

      var submit_btn_class = 'btn btn-danger';

      $('.modal-title').html(title);
      $('.modal-body').html(body);
      $('#confirm-form').attr('action', '/my-booking-list/'+id+'/cancel');
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