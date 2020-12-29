@extends('layouts.admin')

@section('title', 'Tambah Jurusan - SEMAK')

@section('header-title', 'Tambah Jurusan')
    
@section('breadcrumbs')
  <div class="breadcrumb-item"><a href="#">Jurusan</a></div>
  <div class="breadcrumb-item"><a href="#">Data Jurusan</a></div>
  <div class="breadcrumb-item active">Tambah Jurusan</div>
@endsection

@section('section-title', 'Tambah Jurusan')
    
@section('section-lead')
  Silakan isi form di bawah ini untuk menambah jurusan.
@endsection

@section('content')

  @component('components.data-entry-form')
    @slot('form_method', 'POST')
    @slot('form_action', 'major.store')

    @slot('input_form')

      @component('components.input-field')
          @slot('input_label', 'Kode')
          @slot('input_type', 'text')
          @slot('input_name', 'code')
          @slot('is_required', 'required')
          @slot('is_autofocus', 'autofocus')
      @endcomponent

      @component('components.input-field')
          @slot('input_label', 'Nama')
          @slot('input_type', 'text')
          @slot('input_name', 'name')
          @slot('is_required', 'required')
      @endcomponent

    @endslot

  @endcomponent

@endsection