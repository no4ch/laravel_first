@extends('dashboard.layouts.default')

@section('title', "Create Question in test #$test_id")

@section('dashboard-content')
  <div class="">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add Question</li>
      </ol>
    </nav>

    <div class="jumbotron">
      <h1 class="display-4">Add Question</h1>
      <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention
                      to featured content or information.</p>
      <a class="btn btn-primary btn-lg" href="{{ route('dashboard.') }}" role="button">Back</a>
    </div>

    {!! Form::open(['route' => ['dashboard.tests.questions.store', $test_id]]) !!}
    @include('dashboard.questions.blocks.form.fields')
    <div class="form-group">
      {!! Form::submit('Add', ['class' => 'btn btn-success']); !!}
    </div>
    {!! Form::close() !!}

    <form action="{{ route("dashboard.questions.store", $test_id) }}" method="POST">
    </form>

  </div>
@endsection
