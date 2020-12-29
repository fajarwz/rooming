@extends('layouts.admin')

@section('title', 'Data Jurusan - SEMAK')

@section('header-title', 'Data Jurusan')
    
@section('breadcrumbs')
  <div class="breadcrumb-item"><a href="#">Jurusan</a></div>
  <div class="breadcrumb-item active">Data Jurusan</div>
@endsection

@section('section-title', 'Jurusan')
    
@section('section-lead')
  Berikut ini adalah daftar seluruh jurusan yang ada.
@endsection

@section('content')

  @component('components.datatables-full-width')

    @slot('add_button')
      <a href="{{ route('major.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i>&nbsp;Tambah Jurusan</a>
    @endslot
  
    @slot('table_id', 'major-table')

    @slot('table_header')
      <tr>
        <th>Kode</th>
        <th>Nama</th>
        <th>Aksi</th>
      </tr>
    @endslot
      
  @endcomponent

@endsection

@push('after-style')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">
  @include('includes.datatables-styles')
@endpush

@push('after-script')
  @include('includes.datatables-scripts')

  <script>
    $('#major-table').DataTable({
        processing: true,
        ajax: '{{ route('major.json') }}',
        columns: [{
                data: 'code',
                name: 'code'
            },
            {
                data: 'name',
                name: 'name'
            },
            {
                data: 'action',
                name: 'action'
            }
        ],
        order: [1, 'asc'],
        stateSave: true
    });

    $(document).on('click', '#delete-btn', function() {
      var id    = $(this).data('id'); 
      var title = 'Yakin ingin menghapus?'; 
      var body  = '<strong>PERINGATAN</strong>:<br>'
                  +'Pastikan tidak ada mahasiswa yang mempunyai jurusan ini!'
      $('#delete-form').attr('action', 'major/'+id);
      $('.modal-title').html(title);
      $('.modal-body').html(body);
      $('#delete-modal').modal('show');
    });

</script>

@include('includes.notification')

@include('includes.delete-modal')

@endpush