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

@endsection