@extends('layouts.main')

@section('title', 'Dashboard - ROOMING')

@section('header-title', 'Dashboard')

@section('breadcrumbs')
  <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
  <div class="breadcrumb-item active">Dashboard</div>
@endsection
    
@section('content')
<div class="row">

  <div class="col-lg-3 col-md-6 col-sm-6 col-12">    
    @component('components.statistic-card')
      @slot('bg_color', 'bg-primary')
      @slot('icon', 'fas fa-calendar')
      @slot('title', 'Book Hari Ini')
      @slot('value', $booking_today)
    @endcomponent
  </div>

  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    @component('components.statistic-card')
      @slot('bg_color', 'bg-success')
      @slot('icon', 'fas fa-calendar-alt')
      @slot('title', 'Book Semua')
      @slot('value', $booking_lifetime)
    @endcomponent
  </div>
  
</div>

@component('components.datatables')
    
  @slot('table_id', 'dashboard-booking-list-table')

  @slot('card_header', 'true')
  @slot('card_header_content')
    <h4>
      Booking hari ini
    </h4>
    <small>
      Diambil dari 3 data teratas.
    </small>
  @endslot

  @slot('buttons')
    <a href="{{ route('my-booking-list.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i>&nbsp;Booking</a>
  @endslot

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

  <script>
  $(document).ready(function() {
    $('#dashboard-booking-list-table').DataTable({
      processing: true,
      ajax: '{{ route('dashboard.booking-list') }}',
      order: [2, 'asc'],
      columns: [
      {
        name: 'DT_RowIndex',
        data: 'DT_RowIndex',
        orderable: false, 
        searchable: false
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
                + `<img src="{{ asset('storage/${data}') }}" class="img-fluid" style="min-width: 100px; height: auto;">`
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

    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox();
    });
  });

</script>

@include('includes.lightbox')

@include('includes.confirm-modal')

@endpush