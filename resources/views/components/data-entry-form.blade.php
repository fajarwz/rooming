<div class="row justify-content-center">
  <div class="col-12 col-md-6 col-lg-6">
    <div class="card">
      <form method="{{ $form_method }}" 
        @empty($update_id)
          action="{{ route($form_action) }}"    
        @endempty 
        @isset($update_id)
          action="{{ route($form_action, $update_id) }}"    
        @endisset 
        @isset($is_form_with_image)
          {{ $is_form_with_image }}
        @endisset>
        @csrf
        @isset($method_put) @method($method_put) @endisset
        <div class="card-body">
          {{ $input_form }}
        </div>
        <div class="card-footer text-right">
          @include('includes.save-cancel-btn')
        </div>
      </form>
    </div>
    
  </div>
</div>