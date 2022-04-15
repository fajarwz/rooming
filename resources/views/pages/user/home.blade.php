@extends('layouts.main')

@section('title', 'Dashboard - ROOMING')

@section('header-title', 'Home')

@section('breadcrumbs')
<div class="breadcrumb-item active">Home</div>
@endsection

@section('content')

<div class="row">

  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4>Booking List</h4>
        <a href="{{ route('user.booking.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
      </div>
      <div class="card-body">
        <table class="table table-hover">
          <tbody>
            @forelse ($bookingList as $booking)
            <tr>
              <td class="">
                <div class="row">
                  <div class="col-12">
                    <div><small>{{ "$booking->start_date_time - $booking->end_date_time" }}</small></div>
                  </div>
                  <div class="col-3 col-md-1">
                    <img src="{{ $booking->room->photo }}" alt="">
                  </div>
                  <div class="col-9 col-md-11 ">
                    <div><strong>{{ $booking->room->name }}</strong></div>
                    <div><small>{{ "oleh " . $booking->user->name }}</small></div>
                    <div><small>{{ $booking->purpose }}</small></div>
                  </div>
                </div>
              </td>
            </tr>
            @empty
              <tr>
                <td>Belum ada data</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>

@endsection

@push('after-script')

@include('includes.lightbox')

@include('includes.confirm-modal')

@endpush