@extends('layouts.main')

@section('title', 'Data Ruangan - ROOMING')

@section('header-title', 'Ruangan')
    
@section('breadcrumbs')
  <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
  <div class="breadcrumb-item active">Ruangan</div>
@endsection

@section('section-title', 'List')
    
@section('section-lead')
  Berikut ini adalah daftar seluruh ruangan.
@endsection

@section('content')

  <div class="row">
    @forelse ($rooms as $room)
    <div class="col-12 col-sm-6 col-md-3 col-lg-2">
      <div class="card">
        <div class="card-header">
          <img src="{{ $room->photo ? Storage::url($room->photo) : asset('icons/door.svg') }}" alt="{{ $room->name }}">
        </div>
        <div class="card-body">
          <div><a href="{{ route('admin.room.edit', $room->id) }}">{{ $room->name }}</a></div>
          <div><small>{{ "$room->capacity orang" }}</small></div>
          <div class="text-muted"><small>{{ "$room->description" }}</small></div>
        </div>
      </div>
    </div>
    @empty
    <div class="col-12">Belum ada data</div>          
    @endforelse
  </div>

@endsection

@push('after-script')

  <script>
  $(document).ready(function() {
    $(document).on('click', '#delete-btn', function() {
      var id    = $(this).data('id'); 
      var title = $(this).data('title');
      var body  = $(this).data('body');

      $('.modal-title').html(title);
      $('.modal-body').html(body);
      $('#confirm-form').attr('action', 'room/'+id);
      $('#confirm-form').attr('method', 'POST');
      $('#submit-btn').attr('class', 'btn btn-danger');
      $('#lara-method').attr('value', 'delete');
      $('#confirm-modal').modal('show');
    });

    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox();
    });
  });

</script>

@include('includes.lightbox')

@include('includes.notification')

@include('includes.confirm-modal')

@endpush