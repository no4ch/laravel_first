@extends('dashboard.layouts.default')

@section('title', "Створити питання для тесту #$test_id")

@section('dashboard-content')
    <div class="">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard.') }}">Адмінка</a></li>
                <li class="breadcrumb-item active" aria-current="page">Додати питання</li>
            </ol>
        </nav>

        <div class="jumbotron">
            <h1 class="display-4">Додати питання</h1>
            <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention
                            to featured content or information.</p>
            <a class="btn btn-primary btn-lg" href="{{ route('dashboard.') }}" role="button">назад</a>
        </div>

        {!! Form::open(['route' => ['dashboard.tests.questions.store', $test_id], 'files' => true]) !!}
        @include('dashboard.questions.blocks.form.fields')
        <div class="form-group">
            {!! Form::submit('Додати', ['class' => 'btn btn-success']); !!}
        </div>
        {!! Form::close() !!}

    </div>
@endsection
