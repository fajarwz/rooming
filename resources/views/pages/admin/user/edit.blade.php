@extends('layouts.main')

@section('title')
    Edit Data User - ROOMING
@endsection 

@section('header-title')
  Edit Data User
@endsection 
    
@section('breadcrumbs')
  <div class="breadcrumb-item"><a href="#">User</a></div>
  <div class="breadcrumb-item"><a href="{{ route('user.index') }}">Data User</a></div>
  <div class="breadcrumb-item">
    <a href="#">Edit Data User</a>
  </div>
  <div class="breadcrumb-item active">{{ $item->name }}</div>
@endsection

@section('section-title')
  Edit Data User
@endsection 
    
@section('section-lead')
  Silakan isi form di bawah ini untuk mengedit data {{ $item->name }}.
@endsection

@section('content')

  @component('components.data-entry-form')

    @slot('form_method', 'POST')
    @slot('method_put', 'PUT')
    @slot('form_action', 'user.update')
    @slot('update_id', $item->id)

    @slot('input_form')

      @component('components.input-field')
          @slot('input_label', 'Nama')
          @slot('input_type', 'text')
          @slot('input_name', 'name')
          @slot('input_value', $item->name)
          @slot('is_required', 'required')
          @slot('is_autofocus', 'autofocus')
      @endcomponent

      @component('components.input-field')
          @slot('input_label', 'Deskripsi')
          @slot('input_type', 'text')
          @slot('input_name', 'description')
          @slot('input_value', $item->description)
      @endcomponent

    @endslot

  @endcomponent

@endsection