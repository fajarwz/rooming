@extends('layouts.admin')

@section('title')
  @if(isset($item))
    Edit Data Ruangan - ROOMING
  @else 
    Tambah Data Ruangan - ROOMING
  @endif
@endsection 

@section('header-title')
  @if(isset($item))
    Edit Data Ruangan
  @else 
    Tambah Data Ruangan
  @endif
@endsection 
    
@section('breadcrumbs')
  <div class="breadcrumb-item"><a href="#">Ruangan</a></div>
  <div class="breadcrumb-item"><a href="{{ route('room.index') }}">Data Ruangan</a></div>
  <div class="breadcrumb-item @if(isset($item)) '' @else 'active' @endif">
    @if(isset($item))
      <a href="#">Edit Data Ruangan</a>
    @else 
      Tambah Data Ruangan 
    @endif
  </div>
  @isset($item)
    <div class="breadcrumb-item active">{{ $item->name }}</div>
  @endisset
@endsection

@section('section-title')
  @if(isset($item))
    Edit Data Ruangan
  @else 
    Tambah Data Ruangan
  @endif
@endsection 
    
@section('section-lead')
  Silakan isi form di bawah ini untuk @if(isset($item)) mengedit data {{ $item->name }} @else menambah data Ruangan. @endif
@endsection

@section('content')

  @component('components.data-entry-form')
    @if(isset($item))
      @slot('form_method', 'POST')
      @slot('method_put', 'PUT')
      @slot('form_action', 'room.update')
      @slot('update_id', $item->id)
      @slot('is_form_with_image', 'enctype=multipart/form-data')
    @else 
      @slot('form_method', 'POST')
      @slot('form_action', 'room.store')
      @slot('is_form_with_image', 'enctype=multipart/form-data')
    @endif

    @slot('input_form')

      @component('components.input-field')
          @slot('input_label', 'Nama')
          @slot('input_type', 'text')
          @slot('input_name', 'name')
          @isset($item->name)
            @slot('input_value')
              {{ $item->name }}
            @endslot 
          @endisset
          @isset($item)
            @slot('is_disabled', 'disabled')  
          @endisset
          @empty($item)
            @slot('is_required', 'required')
            @slot('is_autofocus', 'autofocus')
          @endempty
      @endcomponent

      @component('components.input-field')
          @slot('input_label', 'Deskripsi')
          @slot('input_type', 'text')
          @slot('input_name', 'description')
          @isset($item->description)
            @slot('input_value')
              {{ $item->description }}
            @endslot 
          @endisset
          @isset($item)
            @slot('is_autofocus', 'autofocus')
          @endisset
      @endcomponent

      @component('components.input-field')
          @slot('input_label', 'Kapasitas')
          @slot('input_type', 'number')
          @slot('input_name', 'capacity')
          @isset($item->capacity)
            @slot('input_value')
              {{ $item->capacity }}
            @endslot 
          @endisset
      @endcomponent

      @component('components.input-field')
          @slot('input_label', 'Foto')
          @slot('input_type', 'file')
          @slot('input_name', 'photo')
          @isset($item)
            @slot('help_text', 'Tidak perlu input foto jika tidak ingin mengeditnya')
          @endisset 
      @endcomponent

    @endslot

  @endcomponent

@endsection
