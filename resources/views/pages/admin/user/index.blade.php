@extends('layouts.admin')

@section('title', 'Data User - ROOMING')

@section('header-title', 'Data User')
    
@section('breadcrumbs')
  <div class="breadcrumb-item"><a href="#">User</a></div>
  <div class="breadcrumb-item active">Data User</div>
@endsection

@section('section-title', 'User')
    
@section('section-lead')
  Berikut ini adalah daftar seluruh user yang ada.
@endsection

@section('content')

  @component('components.datatables-full-width')

    @slot('add_button')
      <a href="{{ route('user.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i>&nbsp;Tambah User</a>
    @endslot
  
    @slot('table_id', 'user-table')

    @slot('table_header')
      <tr>
        <th>#</th>
        <th>Username</th>
        <th>Nama</th>
        <th>Deskripsi</th>
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
    $(document).ready(function() {
      $('#user-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route('user.json') }}',
        columns: [
            {
                data: 'DT_RowIndex',
                name: 'DT_RowIndex'
            },
            {
                data: 'username',
                name: 'username'
            },
            {
                data: 'name',
                render: function ( data, type, row ) {
                  var result = row.name;

                  if (!('ontouchstart' in window || navigator.msMaxTouchPoints)) {
                    result += '<div class="table-links">';
                  } else {
                    result += '<div>';
                  }

                  result += ' <a href="user/'+row.id+'/edit"'
                  + ' class="text-primary">Edit</a>'

                  + ' <div class="bullet"></div>'

                  + ' <a href="user/'+row.id+'/change-pass"'
                  + ' class="text-primary">Ganti Password</a>'

                  + ' <div class="bullet"></div>'

                  + ' <a href="javascript:;" data-id="'+row.id+'" '
                  + ' class="text-danger"'
                  + ' id="delete-btn"'
                  + ' name="delete-btn">Hapus'
                  + ' </a>'
                  + '</div>';

                  return result;
                }
            },
            {
                data: 'description',
                name: 'description'
            },
        ],
        order: [1, 'asc'],
        columnDefs: [
            { responsivePriority: 1, targets: 2 },
        ],
        stateSave: true
      });

      $(document).on('click', '#delete-btn', function() {
        var id    = $(this).data('id'); 
        var title = 'Hapus'; 
        var body  = 'Yakin ingin menghapus ini?'
        $('#delete-form').attr('action', 'user/'+id);
        $('.modal-title').html(title);
        $('.modal-body').html(body);
        $('#delete-modal').modal('show');
      });
    
      
        // $('#user-table').removeClass('table-links');
    });

</script>

@include('includes.notification')

@include('includes.delete-modal')

@endpush