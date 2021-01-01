@extends('layouts.admin')

@section('title', 'Data Ruangan - ROOMING')

@section('header-title', 'Data Ruangan')
    
@section('breadcrumbs')
  <div class="breadcrumb-item"><a href="#">Ruangan</a></div>
  <div class="breadcrumb-item active">Data Ruangan</div>
@endsection

@section('section-title', 'Ruangan')
    
@section('section-lead')
  Berikut ini adalah daftar seluruh ruangan.
@endsection

@section('content')

  @component('components.datatables-full-width')

    @slot('add_button')
      <a href="{{ route('room.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i>&nbsp;Tambah Ruangan</a>
    @endslot
    
    @slot('table_id', 'room-table')

    @slot('table_header')
      <tr>
        <th>#</th>
        <th>Foto</th>
        <th>Nama</th>
        <th>Deskripsi</th>
        <th>Kapasitas</th>
        <th>Status</th>
      </tr>
    @endslot
      
  @endcomponent

@endsection

@push('after-script')

  <script>
  $(document).ready(function() {
    $('#room-table').DataTable({
      processing: true,
      serverSide: true,
      ajax: '{{ route('room.json') }}',
      columns: [
      {
        data: 'DT_RowIndex',
        name: 'DT_RowIndex',
        orderable: false, 
        searchable: false
      },
      {
        data: 'photo',
        render: function ( data, type, row ) {
          if(data != null) {
            return `<div class="gallery gallery-fw">`
              + `<a href="{{ asset('storage/${data}') }}" data-toggle="lightbox">`
              + `<img src="{{ asset('storage/${data}') }}" class="img-fluid">`
              + `</a>`
            + '</div>';
          } else {
            return '-'
          }
        }
      },
      {
        data: 'name',
        render: function ( data, type, row ) {
          var result = row.name;

          var is_touch_device = 'ontouchstart' in window || navigator.msMaxTouchPoints;

          if (is_touch_device) {
            result += '<div>';
          } else {
            result += '<div class="table-links">';
          }

          result += ' <a href="room/'+row.id+'/edit"'
          + ' class="text-primary">Edit</a>'

          + ' <div class="bullet"></div>'

          + ' <a href="javascript:;" data-id="'+row.id+'" '
          + ' class="text-danger"'
          + ' id="delete-btn"'
          + ' name="delete-btn">Hapus'
          + ' </a>'
          + '</div>';

          return result;
            
        }
      },
      {
        data: 'description',
        name: 'description'
      },
      {
        data: 'capacity',
        name: 'capacity'
      },
      {
        data: 'room_status.status',
        name: 'room_status.status'
      },
    ],
      order: [2, 'asc'],
    });
  

    $(document).on('click', '#delete-btn', function() {
      var id    = $(this).data('id'); 
      var title = 'Hapus'; 
      var body  = 'Yakin ingin menghapus ini?'
      $('#delete-form').attr('action', 'room/'+id);
      $('.modal-title').html(title);
      $('.modal-body').html(body);
      $('#delete-modal').modal('show');
    });

    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox();
    });
  });

</script>

@include('includes.lightbox')

@include('includes.notification')

@include('includes.delete-modal')

@endpush