@extends('layouts.admin')

@section('title')
  @if(isset($item))
    Edit Data Dosen - SEMAK
  @else 
    Tambah Data Dosen - SEMAK
  @endif
@endsection 

@section('header-title')
  @if(isset($item))
    Edit Data Dosen
  @else 
    Tambah Data Dosen
  @endif
@endsection 
    
@section('breadcrumbs')
  <div class="breadcrumb-item"><a href="#">Identitas</a></div>
  <div class="breadcrumb-item"><a href="{{ route('lecturer-data.index') }}">Data Dosen</a></div>
  <div class="breadcrumb-item @if(isset($item)) '' @else 'active' @endif">
    @if(isset($item))
      <a href="#">Edit Data Dosen</a>
    @else 
      Tambah Data Dosen 
    @endif
  </div>
  @isset($item)
    <div class="breadcrumb-item active">{{ $item->name }}</div>
  @endisset
@endsection

@section('section-title')
  @if(isset($item))
    Edit Data Dosen
  @else 
    Tambah Data Dosen
  @endif
@endsection 
    
@section('section-lead')
  Silakan isi form di bawah ini untuk @if(isset($item)) mengedit data {{ $item->name }} @else menambah data Dosen. @endif
@endsection

@section('content')

  @component('components.data-entry-form')
    @if(isset($item))
      @slot('form_method', 'POST')
      @slot('method_put', 'PUT')
      @slot('form_action', 'lecturer-data.update')
      @slot('update_id', $item->id)
      @slot('is_form_with_image', 'enctype=multipart/form-data')
    @else 
      @slot('form_method', 'POST')
      @slot('form_action', 'lecturer-data.store')
      @slot('is_form_with_image', 'enctype=multipart/form-data')
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
          @slot('input_label', 'NIDN')
          @slot('input_type', 'text')
          @slot('input_name', 'nidn')
          @isset($item->nidn)
            @slot('input_value')
              {{ $item->nidn }}
            @endslot 
          @endisset
          @if(isset($item))
            @slot('is_disabled', 'disabled')
          @else 
            @slot('is_required', 'required')
            @slot('is_autofocus', 'autofocus')
          @endif
      @endcomponent

      @component('components.input-field')
          @slot('input_label', 'Nama')
          @slot('input_type', 'text')
          @slot('input_name', 'name')
          @isset($item->name)
            @slot('input_value')
              {{ $item->name }}
            @endslot 
          @endisset
          @empty($item)
              @slot('is_autofocus', 'autofocus')
          @endempty
          @slot('is_required', 'required')
      @endcomponent

      @component('components.input-field')
          @slot('form_row', 'open')
          @slot('col', 'col-md-6')
          @slot('input_label', 'Tempat Lahir')
          @slot('input_type', 'text')
          @slot('input_name', 'pob')
          @isset($item->pob)
            @slot('input_value')
              {{ $item->pob }}
            @endslot 
          @endisset
          @slot('is_required', 'required')
      @endcomponent

      @component('components.input-field')
          @slot('form_row', 'close')
          @slot('col', 'col-md-6')
          @slot('input_label', 'Tanggal Lahir')
          @slot('input_type', 'text')
          @slot('input_name', 'dob')
          @isset($item->dob)
            @slot('input_value')
              {{ $item->dob }}
            @endslot 
          @endisset
          @slot('is_datepicker', 'datepicker')
          @slot('is_required', 'required')
      @endcomponent

      @component('components.input-field')
          @slot('input_label', 'Jenis Kelamin')
          @slot('input_name', 'gender')
          @slot('input_type', 'select')
          @slot('select_content')
            <option value="" selected>Pilih Jenis Kelamin</option>
            <option value="LAKI-LAKI"
                @isset($item->gender)
                  {{ $item->gender == "LAKI-LAKI" ? "selected":"" }}
                @endisset
                {{ old('gender') == "LAKI-LAKI" ? "selected":"" }}>
                LAKI-LAKI
            </option>
            <option value="PEREMPUAN"
                @isset($item->gender)
                  {{ $item->gender == "PEREMPUAN" ? "selected":"" }}
                @endisset
                {{ old('gender') == "PEREMPUAN" ? "selected":"" }}>
                PEREMPUAN
            </option>
          @endslot
          @slot('is_required', 'required')
      @endcomponent

      @component('components.input-field')
          @slot('input_label', 'Alamat')
          @slot('input_type', 'textarea')
          @slot('input_name', 'address')
          @isset($item->address)
            @slot('input_value')
              {{ $item->address }}
            @endslot 
          @endisset
          @slot('is_required', 'required')
      @endcomponent

      @component('components.input-field')
          @slot('input_label', 'Provinsi')
          @slot('input_name', 'province_id')
          @slot('input_type', 'select')
          @slot('select_content')
            <option value="">Pilih Provinsi</option>
            @foreach ($provinces as $province)

            <option value="{{ $province->id }}"
              @isset($item->province_id)
                @if ($province->id == $item->province_id)
                  selected  
                @endif
              @endisset>
                {{ $province->name }}</option>

            @endforeach
          @endslot
      @endcomponent

      @component('components.input-field')
          @slot('input_label', 'Kabupaten/Kota')
          @slot('input_name', 'regency_id')
          @slot('input_type', 'select')
          @slot('select_content')
            <option value="{{ $item->regency_id ?? '' }}">
              {{ $item->regency->name ?? 'Silakan pilih provinsi dulu' }}</option>
          @endslot
      @endcomponent

      @component('components.input-field')
          @slot('input_label', 'Kecamatan')
          @slot('input_name', 'district_id')
          @slot('input_type', 'select')
          @slot('select_content')
            <option value="{{ $item->district_id ?? '' }}">
            {{ $item->district->name ?? 'Silakan pilih kabupaten/kota dulu' }}</option>
          @endslot
      @endcomponent

      @component('components.input-field')
          @slot('input_label', 'Kelurahan')
          @slot('input_type', 'text')
          @slot('input_name', 'village')
          @isset($item->village)
            @slot('input_value')
              {{ $item->village }}
            @endslot 
          @endisset
      @endcomponent

      @component('components.input-field')
          @slot('input_label', 'Kode Pos')
          @slot('input_type', 'text')
          @slot('input_name', 'postal_code')
          @isset($item->postal_code)
            @slot('input_value')
              {{ $item->postal_code }}
            @endslot 
          @endisset
      @endcomponent

      @component('components.input-field')
          @slot('input_label', 'Handphone / WA')
          @slot('input_type', 'text')
          @slot('input_name', 'handphone_wa')
          @isset($item->handphone_wa)
            @slot('input_value')
              {{ $item->handphone_wa }}
            @endslot 
          @endisset
      @endcomponent

      @component('components.input-field')
          @slot('input_label', 'E-mail')
          @slot('input_type', 'text')
          @slot('input_name', 'email')
          @isset($item->email)
            @slot('input_value')
              {{ $item->email }}
            @endslot 
          @endisset
      @endcomponent

      @component('components.input-field')
          @slot('input_label', 'Agama')
          @slot('input_name', 'religion')
          @slot('input_type', 'select')
          @slot('select_content')
            <option value="" selected>Pilih Agama</option>
            <option value="ISLAM"
                @isset($item->religion) @if($item->religion == 'ISLAM') selected @endif @endisset
                {{ old('religion') == "ISLAM" ? "selected":"" }}>
                ISLAM
            </option>
            <option value="PROTESTAN"
                @isset($item->religion) @if($item->religion == 'PROTESTAN') selected @endif @endisset
                {{ old('religion') == "PROTESTAN" ? "selected":"" }}>
                PROTESTAN
            </option>
            <option value="KATOLIK"
                @isset($item->religion) @if($item->religion == 'KATOLIK') selected @endif @endisset
                {{ old('religion') == "KATOLIK" ? "selected":"" }}>
                KATOLIK
            </option>
            <option value="HINDU"
                @isset($item->religion) @if($item->religion == 'HINDU') selected @endif @endisset
                {{ old('religion') == "HINDU" ? "selected":"" }}>
                HINDU
            </option>
            <option value="BUDDHA"
                @isset($item->religion) @if($item->religion == 'BUDDHA') selected @endif @endisset
                {{ old('religion') == "BUDDHA" ? "selected":"" }}>
                BUDDHA
            </option>
            <option value="KONGHUCU"
                @isset($item->religion) @if($item->religion == 'KONGHUCU') selected @endif @endisset
                {{ old('religion') == "KONGHUCU" ? "selected":"" }}>
                KONGHUCU 
            </option>
          @endslot
          @slot('is_required', 'required')
      @endcomponent

      @component('components.input-field')
          @slot('input_label', 'Foto')
          @slot('input_type', 'file')
          @slot('input_name', 'photo')
          @isset($item)
            @slot('help_text', 'Tidak perlu input foto jika tidak ingin mengeditnya')
          @endisset 
      @endcomponent

      @empty($item)

        <hr>

        @component('components.input-field')
            @slot('form_row', 'open')
            @slot('col', 'col-md-6')
            @slot('input_label', 'Password')
            @slot('input_type', 'password')
            @slot('input_name', 'password')
            @slot('help_text', 'Password ini adalah yang akan digunakan Dosen untuk masuk ke sistem. Admin meminta password yang diinginkan kepada Dosen. Dan username Dosen ialah NIDN-nya')
            @slot('is_required', 'required')
        @endcomponent

        @component('components.input-field')
            @slot('form_row', 'close')
            @slot('col', 'col-md-6')
            @slot('input_label', 'Confirm Password')
            @slot('input_type', 'password')
            @slot('input_name', 'confirm_password')
            @slot('help_text', 'Masukkan password lagi.')
            @slot('is_required', 'required')
        @endcomponent

      @endempty

    @endslot

  @endcomponent

@endsection

@push('after-style')
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@endpush

@push('after-script')
  <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
  
  <script>
    $('#province_id').on('change', function() {
      var province_id = $(this).val()
        $('#regency_id').empty()
        $.ajax({
            url: `/admin/address/province/${province_id}/regencies`,
            success: data => {
                $('#regency_id').append(
                  '<option value="">Silakan pilih Kabupaten/Kota</option>'
                )
                data.forEach(regency =>
                    $('#regency_id').append(
                      `<option value="${regency.id}">${regency.name}</option>`
                    )
                )
            }
        })
    })

    $('#regency_id').on('change', function() {
      var regency_id = $(this).val()
        $('#district_id').empty()
        $.ajax({
            url: `/admin/address/regency/${regency_id}/districts`,
            success: data => {
                $('#district_id').append(
                  '<option value="">Silakan pilih Kecamatan</option>'
                )
                data.forEach(district =>
                    $('#district_id').append(`<option value="${district.id}">${district.name}</option>`)
                )
            }
        })
    })
  </script>
@endpush