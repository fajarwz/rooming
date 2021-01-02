@extends('layouts.admin')

@section('title', 'Ganti Password - ROOMING')

@section('header-title', 'Ganti Password')
    
@section('breadcrumbs')
  <div class="breadcrumb-item"><a href="#">Setting</a></div>
  <div class="breadcrumb-item active">Ganti Password</div>
@endsection

@section('section-title', 'Ganti Password ')
    
@section('section-lead')
  Silakan isi form di bawah ini untuk mengganti password.
@endsection

@section('content')

  @component('components.data-entry-form')
      @slot('form_method', 'POST')
      @slot('method_put', 'PUT')
      @slot('form_action', 'change-pass.update')

    @slot('input_form')

      @component('components.input-field')
          @slot('input_label', 'Password Sekarang')
          @slot('input_type', 'password')
          @slot('input_name', 'current_password')
          @slot('is_required', 'required')
          @slot('is_autofocus', 'autofocus')
      @endcomponent

      @component('components.input-field')
          @slot('input_label', 'Password Baru')
          @slot('input_type', 'password')
          @slot('input_name', 'new_password')
          @slot('is_required', 'required')
      @endcomponent

      @component('components.input-field')
          @slot('input_label', 'Konfirmasi Password Baru')
          @slot('input_type', 'password')
          @slot('input_name', 'new_password_confirmation')
          @slot('is_required', 'required')
      @endcomponent

    @endslot

  @endcomponent

  @include('includes.notification')

@endsection
