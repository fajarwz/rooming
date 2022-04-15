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

<div class="row">
  @forelse ($rooms as $room)
  <div class="col-12 col-sm-6 col-md-3 col-lg-2">
    <div class="card">
      <div class="card-header">
        <img src="{{ $room->photo ? Storage::url($room->photo) : asset('icons/door.svg') }}" alt="{{ $room->name }}">
      </div>
      <div class="card-body">
        <div><a href="{{ route('admin.room.edit', $room->id) }}">{{ $room->name }}</a></div>
        <div><small>{{ "$room->capacity orang" }}</small></div>
        <div class="text-muted"><small>{{ "$room->description" }}</small></div>
      </div>
    </div>
  </div>
  @empty
  <div class="col-12">Belum ada data</div>
  @endforelse
</div>

@endsection

@push('after-script')

@include('includes.lightbox')

@include('includes.notification')

@include('includes.confirm-modal')

@endpush