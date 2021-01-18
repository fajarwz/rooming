@extends('layouts.main')

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

  @component('components.form')
    @slot('row_class', 'justify-content-center')
    @slot('col_class', 'col-12 col-md-6')

    @slot('form_method', 'POST')
    @slot('method', 'PUT')

    @if (Auth::user()->role == 'USER')
      @slot('form_action', 'user.change-pass.update')
    @elseif(Auth::user()->role == 'ADMIN')
      @slot('form_action', 'admin.change-pass.update')
    @endif

    @slot('input_form')

      @component('components.input-field')
          @slot('input_label', 'Password Sekarang')
          @slot('input_type', 'password')
          @slot('input_name', 'current_password')
          @slot('form_group_class', 'required')
          @slot('other_attributes', 'required autofocus')
      @endcomponent

      @component('components.input-field')
          @slot('input_label', 'Password Baru')
          @slot('input_type', 'password')
          @slot('input_name', 'new_password')
          @slot('form_group_class', 'required')
          @slot('other_attributes', 'required')
      @endcomponent

      @component('components.input-field')
          @slot('input_label', 'Konfirmasi Password Baru')
          @slot('input_type', 'password')
          @slot('input_name', 'new_password_confirmation')
          @slot('form_group_class', 'required')
          @slot('other_attributes', 'required')
      @endcomponent

    @endslot

    @slot('card_footer', 'true')
    @slot('card_footer_class', 'text-right')
    @slot('card_footer_content')
      @include('includes.save-cancel-btn')
    @endslot 

  @endcomponent

  @include('includes.notification')

@endsection
