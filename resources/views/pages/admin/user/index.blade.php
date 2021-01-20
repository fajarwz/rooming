@extends('layouts.main')

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

  @component('components.datatables')

    @slot('buttons')
      <a href="{{ route('user.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i>&nbsp;Tambah User</a>
    @endslot
  
    @slot('table_id', 'user-table')

    @slot('table_header')
      <tr>
        <th>#</th>
        <th>Email</th>
        <th>Username</th>
        <th>Nama</th>
        <th>Deskripsi</th>
      </tr>
    @endslot
      
  @endcomponent

@endsection

@push('after-script')

  <script>
    $(document).ready(function() {
      $('#user-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route('user.json') }}',
        columns: [
            {
                name: 'DT_RowIndex',
                data: 'DT_RowIndex',
                orderable: false, 
                searchable: false
            },
            {
                name: 'email',
                data: 'email',
            },
            {
                name: 'username',
                data: 'username',
            },
            {
                name: 'name',
                data: 'name',
                render: function ( data, type, row ) {
                  var result = row.name;

                  var is_touch_device = 'ontouchstart' in window || navigator.msMaxTouchPoints;

                  if (is_touch_device) {
                    result += '<div>';
                  } else {
                    result += '<div class="table-links">';
                  }

                  result += ' <a href="user/'+row.id+'/edit"'
                  + ' class="text-primary">Edit</a>'

                  + ' <div class="bullet"></div>'

                  + ' <a href="user/'+row.id+'/change-pass"'
                  + ' class="text-primary">Ganti Password</a>'

                  + ' <div class="bullet"></div>'

                  + ' <a href="javascript:;" data-id="'+row.id+'" '
                  + ' data-title="Hapus"'
                  + ' data-body="Yakin ingin menghapus ini?"'
                  + ' class="text-danger"'
                  + ' id="delete-btn"'
                  + ' name="delete-btn">Hapus'
                  + ' </a>'
                  + '</div>';

                  return result;
                }
            },
            {
                name: 'description',
                data: 'description',
            },
        ],
        order: [1, 'asc'],
      });

      $(document).on('click', '#delete-btn', function() {
        var id    = $(this).data('id');
        var title = $(this).data('title');
        var body  = $(this).data('body');

        $('.modal-title').html(title);
        $('.modal-body').html(body);
        $('#confirm-form').attr('action', 'user/'+id);
        $('#confirm-form').attr('method', 'POST');
        $('#submit-btn').attr('class', 'btn btn-danger');
        $('#lara-method').attr('value', 'delete');
        $('#confirm-modal').modal('show');
      });
    
    });

</script>

@include('includes.notification')

@include('includes.confirm-modal')

@endpush