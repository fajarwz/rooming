@extends('layouts.main')

@section('title')
Tambah Data User - ROOMING
@endsection 

@section('header-title')
Tambah Data User
@endsection 
    
@section('breadcrumbs')
  <div class="breadcrumb-item"><a href="#">User</a></div>
  <div class="breadcrumb-item"><a href="{{ route('user.index') }}">Data User</a></div>
  <div class="breadcrumb-item active">
    Tambah Data User
  </div>
@endsection

@section('section-title')
Tambah Data User
@endsection 
    
@section('section-lead')
  Silakan isi form di bawah ini untuk menambah data user. 
@endsection

@section('content')

  @component('components.data-entry-form')

      @slot('form_method', 'POST')
      @slot('form_action', 'user.store')

    @slot('input_form')

      @component('components.input-field')
          @slot('input_label', 'Username')
          @slot('input_type', 'text')
          @slot('input_name', 'username')
          @slot('is_required', 'required')
          @slot('is_autofocus', 'autofocus')
      @endcomponent

      @component('components.input-field')
          @slot('input_label', 'Password')
          @slot('input_type', 'password')
          @slot('input_name', 'password')
          @slot('is_required', 'required')
      @endcomponent

      @component('components.input-field')
          @slot('input_label', 'Confirm Password')
          @slot('input_type', 'password')
          @slot('input_name', 'confirm_password')
          @slot('is_required', 'required')
      @endcomponent

      <hr>

      @component('components.input-field')
          @slot('input_label', 'Nama')
          @slot('input_type', 'text')
          @slot('input_name', 'name')
          @slot('is_required', 'required')
      @endcomponent

      @component('components.input-field')
          @slot('input_label', 'Deskripsi')
          @slot('input_type', 'text')
          @slot('input_name', 'description')
      @endcomponent

    @endslot

  @endcomponent

@endsection