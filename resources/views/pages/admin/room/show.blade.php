@extends('layouts.admin')

@section('title', 'Detail Data Dosen - SEMAK')

@section('header-title', 'Detail Data Dosen')
    
@section('breadcrumbs')
  <div class="breadcrumb-item"><a href="#">Identitas</a></div>
  <div class="breadcrumb-item"><a href="#">Data Dosen</a></div>
  <div class="breadcrumb-item active">{{ $item->name }}</div>  
@endsection

@section('section-title', 'Detail Data Dosen')
    
@section('section-lead')
  Berikut ini adalah data identitas dosen bernama {{ $item->name }}.
@endsection

@section('content')

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-4">
                <div class="gallery gallery-fw" data-item-height="300">
                  <div class="gallery-item" data-image="{{ asset('storage/'.$item->photo) }}"
                  data-title="Image 1" href="{{ asset('storage/'.$item->photo) }}"
                  title=""
                  style="background-image: url('{{ asset('storage/'.$item->photo) }}');"></div>
                </div>
              </div>
              <div class="col-8 table-responsive">
                <table class="table table-show-student-data">
                  <tr>
                    <td><strong>NIDN</strong></td>
                    <td>{{ $item->nidn }}</td>
                  </tr>
                  <tr>
                    <td><strong>Nama</strong></td>
                    <td>{{ $item->name }}</td>
                  </tr>
                  <tr>
                    <td><strong>Tempat, Tanggal Lahir</strong></td>
                    <td>{{ $item->pob }}, {{ $item->dob }}</td>
                  </tr>
                  <tr>
                    <td><strong>Jenis Kelamin</strong></td>
                    <td>{{ $item->gender }}</td>
                  </tr>
                  <tr>
                    <td><strong>Alamat</strong></td>
                    <td>{{ $item->address }}</td>
                  </tr>
                  <tr>
                    <td><strong>Provinsi</strong></td>
                    <td>{{ $item->province->name ?? '-' }}</td>
                  </tr>
                  <tr>
                    <td><strong>Kabupaten/Kota</strong></td>
                    <td>{{ $item->regency->name ?? '-' }}</td>
                  </tr>
                  <tr>
                    <td><strong>Kecamatan</strong></td>
                    <td>{{ $item->district->name ?? '-' }}</td>
                  </tr>
                  <tr>
                    <td><strong>Kelurahan</strong></td>
                    <td>{{ $item->village ?? '-' }}</td>
                  </tr>
                  <tr>
                    <td><strong>Kode Pos</strong></td>
                    <td>{{ $item->postal_code ?? '-' }}</td>
                  </tr>
                  <tr>
                    <td><strong>Handphone / WA</strong></td>
                    <td>{{ $item->handphone_wa ?? '-' }}</td>
                  </tr>
                  <tr>
                    <td><strong>E-mail</strong></td>
                    <td>{{ $item->email ?? '-' }}</td>
                  </tr>
                  <tr>
                    <td><strong>Agama</strong></td>
                    <td>{{ $item->religion }}</td>
                  </tr>
                </table>
                <div class="text-center">
                  <a type="button" href="{{ URL::previous() }}" class="btn btn-primary">Kembali</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection

@include('includes.delete-modal')