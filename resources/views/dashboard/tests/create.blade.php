@extends('dashboard.layouts.default')

@section('title', 'Створити тест')

@section('dashboard-content')
  <div class="">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.') }}">Адмінка</a></li>
        <li class="breadcrumb-item active" aria-current="page">Створити тест</li>
      </ol>
    </nav>

    <div class="jumbotron">
      <h1 class="display-4">Створити тест</h1>
      <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention
                      to featured content or information.</p>
      <a class="btn btn-primary btn-lg" href="{{ route('dashboard.') }}" role="button">Назад</a>
    </div>

    {!! Form::open(['url' => route('dashboard.tests.store')]) !!}
    @include('dashboard.tests.blocks.form.fields')
    <div class="form-group">
      {!! Form::submit('Створити', ['class' => 'btn btn-success']); !!}
    </div>
    {!! Form::close() !!}
  </div>
@endsection
