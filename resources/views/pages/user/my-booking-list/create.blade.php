@extends('layouts.main')

@section('title')
  Buat Booking - ROOMING
@endsection 

@section('header-title')
  Buat Booking
@endsection 
    
@section('breadcrumbs')
  <div class="breadcrumb-item"><a href="#">Transaksi</a></div>
  <div class="breadcrumb-item"><a href="{{ route('my-booking-list.index') }}">My Booking</a></div>
  <div class="breadcrumb-item active">
    Buat Booking
  </div>
@endsection

@section('section-title')
  Buat Booking
@endsection 
    
@section('section-lead')
  Silakan isi form di bawah ini untuk membuat booking.
@endsection

@section('content')

  @component('components.data-entry-form')
    @slot('form_method', 'POST')
    @slot('form_action', 'my-booking-list.store')

    @slot('input_form')

      @component('components.input-field')
          @slot('input_label', 'Nama Ruangan')
          @slot('input_type', 'select')
          @slot('select_content')
            <option value="">Pilih Ruangan</option>
            @foreach ($rooms as $room)
            <option value="{{ $room->id }}"
                {{ old('room_id') == $room->id ? 'selected' : '' }}>
                {{ $room->name }}</option>
            @endforeach
          @endslot
          @slot('input_name', 'room_id')
          @slot('is_required', 'required')
          @slot('is_autofocus', 'autofocus')
      @endcomponent

      @component('components.input-field')
          @slot('input_label', 'Tanggal Booking')
          @slot('input_type', 'text')
          @slot('input_name', 'date')
          @slot('is_datepicker', 'datepicker')
          @slot('is_required', 'required')
      @endcomponent

      @component('components.input-field')
          @slot('form_row', 'open')
          @slot('col', 'col-md-6')
          @slot('input_label', 'Waktu Mulai')
          @slot('input_type', 'text')
          @slot('input_id', 'start_time')
          @slot('input_name', 'start_time')
          @slot('placeholder', 'HH:mm')
          @slot('is_timepicker', 'timepicker')
          @slot('is_required', 'required')
      @endcomponent

      @component('components.input-field')
          @slot('form_row', 'close')
          @slot('col', 'col-md-6')
          @slot('input_label', 'Waktu Selesai')
          @slot('input_type', 'text')
          @slot('input_id', 'end_time')
          @slot('input_name', 'end_time')
          @slot('placeholder', 'HH:mm')
          @slot('is_timepicker', 'timepicker')
          @slot('is_required', 'required')
      @endcomponent

      @component('components.input-field')
          @slot('input_label', 'Keperluan')
          @slot('input_type', 'text')
          @slot('input_name', 'purpose')
          @slot('is_required', 'required')
      @endcomponent

    @endslot

  @endcomponent

@endsection

@push('after-style')
  {{-- datepicker  --}}
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
  {{-- datepicker  --}}
@endpush

@push('after-script')
  {{-- datepicker  --}}
  <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
  {{-- datepicker  --}}
@endpush

@include('includes.notification')