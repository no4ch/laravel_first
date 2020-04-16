<div class="row">
  <div class="col-sm-12 col-md-6">
    <div class="form-group">
      {!! Form::label('answer', 'Answer') !!}
      {!! Form::text('answer', $answer->answer ?? null, ['class' => 'form-control']) !!}
    </div>

    @error('answer')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
      {!! Form::label('status', 'Status') !!}
      {!! Form::select('status', ['true' => 'True', 'false' => 'False'], $answer->status ?? 'false', ['class' => 'custom-select']) !!}
    </div>

    @error('status')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

  </div>
</div>
