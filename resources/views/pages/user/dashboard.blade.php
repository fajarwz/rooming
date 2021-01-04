@extends('layouts.main')

@section('title', 'Dashboard User - ROOMING')

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
      @slot('icon', 'fas fa-door-open')
      @slot('title', 'Book Hari Ini')
      @slot('value', $booking_today)
    @endcomponent
  </div>

  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    @component('components.statistic-card')
      @slot('bg_color', 'bg-success')
      @slot('icon', 'fa fa-calendar')
      @slot('title', 'Book Sepanjang Waktu')
      @slot('value', $booking_lifetime)
    @endcomponent
  </div>
  
  
</div>
@endsection