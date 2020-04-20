<div class="row">
  <div class="col-sm-12 col-md-6">

    <div class="form-group">
      {!! Form::label('question', 'Question') !!}
      {!! Form::text('question', $question->question ?? null, ['class' => 'form-control']) !!}
    </div>

    @error('question')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
      {!! Form::label('file_id', "File id") !!}
      {!! Form::number('file_id', $question->file_id ?? null, ['class' => 'form-control']) !!}

    </div>

    @error('file_id')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

  </div>
</div>
