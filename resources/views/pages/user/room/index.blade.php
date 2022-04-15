@extends('layouts.main')

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

<div class="row">
  @forelse ($rooms as $room)
  <div class="col-12 col-sm-6 col-md-3 col-lg-2">
    <div class="card">
      <div class="card-header">
        <img src="{{ $room->photo }}" alt="{{ $room->name }}">
      </div>
      <div class="card-body">
        <div><strong>{{ $room->name }}</strong></div>
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

@endpush