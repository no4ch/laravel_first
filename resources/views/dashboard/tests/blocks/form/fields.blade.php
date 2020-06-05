<div class="row">
  <div class="col-sm-12 col-md-6">
    <div class="form-group">
      {!! Form::label('name', "Ім'я") !!}
      {!! Form::text('name', $test->name ?? null, ['class' => 'form-control']) !!}
    </div>

    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
      {!! Form::label('status', 'Статус') !!}
      {!! Form::select('status', ['completed' => 'Доступний', 'developing' => 'В розробці'], $test->status ?? 'developing', ['class' => 'custom-select']) !!}
    </div>

    @error('status')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
</div>
