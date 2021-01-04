@if ($input_type != 'hidden')

@if (isset($form_row) && $form_row == 'open')
<div class="form-row">
@endif

  <div class="form-group @isset($col) {{ $col }} @endisset @isset($is_required) {{ $is_required }} @endisset">

    <label class="input-label">@isset($input_label){{ $input_label }}@endisset</label>

@endif

  @if ($input_type == 'text' || $input_type == 'number' || $input_type == 'password' || $input_type == 'hidden')

      <input type="{{ $input_type }}" 
      @isset($input_id) {{ 'id='.$input_id }} @endisset
      @isset($input_name) {{ 'name='.$input_name }} @endisset
      @isset($placeholder) {{ 'placeholder='.$placeholder }} @endisset 
      class="form-control 
      @isset($is_datepicker) {{ $is_datepicker }} @endisset 
      @isset($is_timepicker) {{ $is_timepicker }} @endisset 
      @error($input_name) is-invalid @enderror" 
      value="@isset($input_value){{ $input_value }}@else{{ ($input_type == 'password') ? '' : old($input_name) }}@endisset"
      @isset($is_disabled) {{ $is_disabled }} @endisset
      @isset($is_required) {{ $is_required }} @endisset 
      @isset($is_autofocus) {{ $is_autofocus }} @endisset>
      @error($input_name)
        @include('includes.error-field')
      @enderror
      @isset($help_text)
        <small class="form-text text-muted">
          {{ $help_text }} 
        </small>
      @endisset

    @elseif ($input_type == 'select')

      <select 
        @isset($input_id) {{ 'id='.$input_id }} @endisset
        @isset($input_name) {{ 'name='.$input_name }} @endisset
        class="form-control @error($input_name) is-invalid @enderror" 
        @isset($is_required) {{ $is_required }} @endisset
        @isset($is_autofocus) {{ $is_autofocus }} @endisset>
        {{ $select_content }}
      </select>
      @error($input_name)
        @include('includes.error-field')
      @enderror

    @elseif ($input_type == 'textarea')

      <textarea class="form-control @error($input_name) is-invalid @enderror" 
        @isset($input_id) {{ 'id='.$input_id }} @endisset
        @isset($input_name) {{ 'name='.$input_name }} @endisset
        @isset($is_required) {{ $is_required }} @endisset 
        @isset($is_autofocus) {{ $is_autofocus }} @endisset
        >@isset($input_value){{ $input_value }}@else{{ old($input_name) }}@endisset</textarea>
      @error($input_name)
        @include('includes.error-field')
      @enderror

    @elseif ($input_type == 'file')

      <div>
        {{-- <div class="col-md-12 mb-2">
          <img id="image-preview-container" src="" alt="Preview Image">
        </div> --}}
        <input type="{{ $input_type }}" class="form-control mb-2 
          @error($input_name) is-invalid @enderror" 
          @isset($input_id) {{ 'id='.$input_id }} @endisset
          @isset($input_name) {{ 'name='.$input_name }} @endisset
          @isset($is_required) {{ $is_required }} @endisset 
          @isset($is_autofocus) {{ $is_autofocus }} @endisset>
        @error($input_name)
          @include('includes.error-field')
        @enderror
      </div>

    @endif

@if ($input_type != 'hidden')

  </div> {{--  form-group --}}

@if (isset($form_row) && $form_row == 'close')
</div> {{--  form-row --}}
@endif  

@endif