@extends('dashboard.layouts.default')

@section('title', 'Edit test')

@section('dashboard-content')
  <div>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Update Test</li>
      </ol>
    </nav>

    <div class="jumbotron">
      <h1 class="display-4">Update Test</h1>
      <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention
                      to featured content or information.</p>
      <a class="btn btn-primary btn-lg" href="{{ route('dashboard.') }}" role="button">Back</a>
    </div>

    {!! Form::open(['method' => 'patch' ,'url' => route('dashboard.tests.update', $test->id)]) !!}
    @include('dashboard.tests.blocks.form.fields')
    <div class="form-group">
      {!! Form::submit('Update', ['class' => 'btn btn-success']); !!}
    </div>
    {!! Form::close() !!}
  </div>
@endsection
