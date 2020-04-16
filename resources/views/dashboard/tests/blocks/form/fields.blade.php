<div class="row">
  <div class="col-sm-12 col-md-6">
    <div class="form-group">
      {!! Form::label('name', 'Name') !!}
      {!! Form::text('name', $test->name ?? null, ['class' => 'form-control']) !!}
    </div>

    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
      {!! Form::label('status', 'Status') !!}
      {!! Form::select('status', ['completed' => 'Completed', 'developing' => 'Developing'], $test->status ?? 'developing', ['class' => 'custom-select']) !!}
    </div>

    @error('status')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
</div>
