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
      @slot('title', 'Book Sepanjang Waktu')
      @slot('value', $booking_lifetime)
    @endcomponent
  </div>
  
</div>

@component('components.datatables-full-width')
    
  @slot('table_id', 'dashboard-booking-list-table')

  @slot('card_header', 'true')
  @slot('card_header_title', 'Booking hari ini')
  @slot('card_header_small', 'Diambil dari 3 data teratas.')

  @slot('add_button')
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

{{-- <div class="row">
  <div class="col-12">
      <div class="card ">
          <div class="card-header ">
              <h4 class="card-title">Booking Hari ini</h4>
              <p class="card-category">diambil dari 3 booking terbaru</p>
          </div>
          <div class="card-body ">

            <a 
              href="{{ route('my-booking-list.create') }}" 
              class="btn btn-primary btn-sm mb-2">
                <i class="fas fa-plus"></i>&nbsp;&nbsp;Buat Booking
            </a>

            <div class="table-responsive overflow-auto">
              <table class="table table-bordered" id="request-table" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Foto Ruangan</th>
                    <th>Ruangan</th>
                    <th>Tanggal</th>
                    <th>Waktu Mulai</th>
                    <th>Waktu Selesai</th>
                    <th>Keperluan</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($book_today as $item)
                      <tr>
                          <td>{{ $no }}</td>
                          <td>{{ $item->room->photo }}</td>
                          <td>{{ $item->room->name }}</td>
                          <td>{{ $item->date }}</td>
                          <td>{{ $item->start_time }}</td>
                          <td>{{ $item->end_time }}</td>
                          <td>{{ $item->purpose }}</td>
                          <td>{{ $item->description }}</td>
                          <td>
                              <a 
                                  href="{{ route('user.request.print', $item->id) }}" 
                                  class="btn btn-primary btn-sm mb-2" id="">
                                  <i class="fas fa-print"></i>&nbsp;&nbsp;Print
                              </a>
                          </td>
                      </tr>
                  @empty 
                      <tr>
                          <td colspan="9" class="text-center">
                              Belum ada request yang dibuat hari ini, klik tombol Buat Request untuk membuat
                          </td>
                      </tr>
                  @endforelse
                </tbody>
              </table>
            </div>

          </div>
      </div>
  </div>
</div> --}}

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
              + `<img src="{{ asset('storage/${data}') }}" class="img-fluid">`
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