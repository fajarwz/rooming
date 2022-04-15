@extends('layouts.main')

@section('title')
  @if(isset($room))
    Detail Ruangan - ROOMING
  @else 
    Tambah Data Ruangan - ROOMING
  @endif
@endsection 

@section('header-title')
  @if(isset($room))
    Detail Ruangan
  @else 
    Tambah Data Ruangan
  @endif
@endsection 
    
@section('breadcrumbs')
  <div class="breadcrumb-item"><a href="{{ route('admin.rooms.index') }}">Ruangan</a></div>
  <div class="breadcrumb-item @if(isset($room)) '' @else 'active' @endif">
    @if(isset($room))
    {{ $room->name }}
    @else 
      Tambah Data Ruangan 
    @endif
  </div>
@endsection

@section('section-title')
  @if(isset($room))
    Edit Data Ruangan
  @else 
    Tambah Data Ruangan
  @endif
@endsection 
    
@section('section-lead')
  Silakan isi form di bawah ini untuk @if(isset($room)) mengedit data {{ $room->name }} @else menambah data Ruangan. @endif
@endsection

@section('content')

  @component('components.form')

    @slot('row_class', 'justify-content-left')
    @slot('col_class', 'col-12 col-md-6')

    @if(isset($room))
      @slot('form_method', 'POST')
      @slot('method', 'PUT')
      @slot('form_action', 'admin.room.update')
      @slot('update_id', $room->id)
    @else 
      @slot('form_method', 'POST')
      @slot('form_action', 'room.store')
    @endif

    @slot('is_form_with_file', 'true')

    @slot('input_form')

      @component('components.input-field')
          @slot('input_label', 'Nama')
          @slot('input_type', 'text')
          @slot('input_name', 'name')
          @isset($room->name)
            @slot('input_value')
              {{ $room->name }}
            @endslot 
          @endisset
          @isset($room)
            @slot('other_attributes', 'disabled')
          @endisset
          @empty($room)
            @slot('form_group_class', 'required')
            @slot('other_attributes', 'required autofocus')
          @endempty
      @endcomponent

      @component('components.input-field')
          @slot('input_label', 'Deskripsi')
          @slot('input_type', 'text')
          @slot('input_name', 'description')
          @isset($room->description)
            @slot('input_value')
              {{ $room->description }}
            @endslot 
          @endisset
          @isset($room)
            @slot('other_attributes', 'autofocus')
          @endisset
      @endcomponent

      @component('components.input-field')
          @slot('input_label', 'Kapasitas')
          @slot('input_type', 'number')
          @slot('input_name', 'capacity')
          @isset($room->capacity)
            @slot('input_value')
              {{ $room->capacity }}
            @endslot 
          @endisset
      @endcomponent

      @component('components.input-field')
          @slot('input_label', 'Foto')
          @slot('input_type', 'file')
          @slot('input_name', 'photo')
          @isset($room)
            @slot('help_text', 'Tidak perlu input foto jika tidak ingin mengeditnya')
          @endisset 
      @endcomponent

    @endslot

    @slot('card_footer', 'true')
    @slot('card_footer_class', 'text-right')
    @slot('card_footer_content')
      @include('includes.save-cancel-btn')
    @endslot 

  @endcomponent

@endsection
