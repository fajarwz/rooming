@extends('layouts.admin')

@section('title', 'Edit Jurusan - SEMAK')

@section('header-title', 'Edit Jurusan')
    
@section('breadcrumbs')
  <div class="breadcrumb-item"><a href="#">Jurusan</a></div>
  <div class="breadcrumb-item"><a href="#">Data Jurusan</a></div>
  <div class="breadcrumb-item active">Edit Jurusan</div>
@endsection

@section('section-title', 'Edit Jurusan')
    
@section('section-lead')
  Silakan isi form di bawah ini untuk mengedit jurusan.
@endsection

@section('content')

  @component('components.data-entry-form')
    @slot('form_method', 'POST')
    @slot('method_put', 'PUT')
    @slot('form_action', 'major.update')
    @slot('update_id', $item->id)

    @slot('input_form')

      @component('components.input-field')
          @slot('input_type', 'hidden')
          @slot('input_name', 'is_edit')
          @slot('value', 'true')
      @endcomponent

      @component('components.input-field')
          @slot('input_label', 'Nama')
          @slot('input_type', 'text')
          @slot('input_name', 'name')
          @slot('value', $item->name)
          @slot('is_required', 'required')
          @slot('is_autofocus', 'autofocus')
      @endcomponent

    @endslot

  @endcomponent

@endsection