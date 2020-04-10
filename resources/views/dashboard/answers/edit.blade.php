@extends('dashboard.layouts.default')

@section('title', 'Edit answer')

@section('dashboard-content')
  <div>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Update Answer</li>
      </ol>
    </nav>

    <div class="jumbotron">
      <h1 class="display-4">Update Answer</h1>
      <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention
                      to featured content or information.</p>
      <a class="btn btn-primary btn-lg" href="{{ route('dashboard.') }}" role="button">Back</a>
    </div>

    {!! Form::open(['method' => 'patch' ,'url' => route('dashboard.answers.update', $answer->id)]) !!}
    @include('dashboard.answers.blocks.form.fields')
    <div class="form-group">
      {!! Form::submit('Update', ['class' => 'btn btn-success']); !!}
    </div>
    {!! Form::close() !!}
  </div>
@endsection
