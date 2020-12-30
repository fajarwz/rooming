@extends('layouts.admin')

@section('title')
  @if(isset($item))
    Edit Data User - ROOMING
  @else 
    Tambah Data User - ROOMING
  @endif
@endsection 

@section('header-title')
  @if(isset($item))
    Edit Data User
  @else 
    Tambah Data User
  @endif
@endsection 
    
@section('breadcrumbs')
  <div class="breadcrumb-item"><a href="#">User</a></div>
  <div class="breadcrumb-item"><a href="{{ route('user.index') }}">Data User</a></div>
  <div class="breadcrumb-item @if(isset($item)) '' @else 'active' @endif">
    @if(isset($item))
      <a href="#">Edit Data User</a>
    @else 
      Tambah Data User
    @endif
  </div>
  @isset($item)
    <div class="breadcrumb-item active">{{ $item->name }}</div>
  @endisset
@endsection

@section('section-title')
  @if(isset($item))
    Edit Data User
  @else 
    Tambah Data User
  @endif
@endsection 
    
@section('section-lead')
  Silakan isi form di bawah ini untuk @if(isset($item)) mengedit data {{ $item->name }}. @else menambah data user. @endif
@endsection

@section('content')

  @component('components.data-entry-form')

    @if(isset($item))
      @slot('form_method', 'POST')
      @slot('method_put', 'PUT')
      @slot('form_action', 'user.update')
      @slot('update_id', $item->id)
    @else 
      @slot('form_method', 'POST')
      @slot('form_action', 'user.store')
    @endif

    @slot('input_form')

      @isset($item)
        @component('components.input-field')
            @slot('input_type', 'hidden')
            @slot('input_name', 'is_edit_data')
            @slot('input_value', 'true')
        @endcomponent
      @endisset

      @component('components.input-field')
          @slot('input_label', 'Username')
          @slot('input_type', 'text')
          @slot('input_name', 'username')
          @isset($item)
            @slot('input_value', $item->username)
          @endisset
          @slot('is_required', 'required')
          @slot('is_autofocus', 'autofocus')
      @endcomponent

      @component('components.input-field')
          @slot('input_label', 'Password')
          @slot('input_type', 'password')
          @slot('input_name', 'password')
          @isset($item)
            @slot('input_value', $item->password)
          @endisset
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
          @isset($item)
            @slot('input_value', $item->name)
          @endisset
          @slot('is_required', 'required')
      @endcomponent

      @component('components.input-field')
          @slot('input_label', 'Deskripsi')
          @slot('input_type', 'text')
          @slot('input_name', 'description')
          @isset($item)
            @slot('input_value', $item->description)
          @endisset
      @endcomponent

    @endslot

  @endcomponent

@endsection