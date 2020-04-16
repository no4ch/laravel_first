<div class="form-group row">
  <div class="col-md-6 offset-md-4">

    {!! NoCaptcha::display() !!}

    @if ($errors->has('g-recaptcha-response'))
      <span class="help-block">
          <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
      </span>
    @endif
  </div>
</div>

@push('scripts')
  {!! NoCaptcha::renderJs() !!}
@endpush
