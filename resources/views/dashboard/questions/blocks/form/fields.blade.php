<div class="row">
  <div class="col-sm-12 col-md-6">

    <div class="form-group">
      {!! Form::label('question', 'Питання') !!}
      {!! Form::text('question', $question->question ?? null, ['class' => 'form-control']) !!}
    </div>

    @error('question')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
        {!! Form::label('image', 'Зображення') !!}
        <br>
        {!! Form::file('image', ['accept' => 'image/*']) !!}
    </div>

    @error('image')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

  </div>
</div>
