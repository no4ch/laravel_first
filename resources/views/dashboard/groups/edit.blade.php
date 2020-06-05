@extends('dashboard.layouts.default')

@section('title', "Редагувати групу #$group->id")

@section('dashboard-content')
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard.') }}">Адмінка</a></li>
                <li class="breadcrumb-item"><a href="{{ route('dashboard.groups.index') }}">Групи</a></li>
                <li class="breadcrumb-item active" aria-current="page">Редагувати групу #{{ $group->id }}</li>
            </ol>
        </nav>

        <div class="jumbotron">
            <h1 class="display-4">Редагувати групу</h1>
            <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention
                            to featured content or information.</p>
            <a class="btn btn-primary btn-lg" href="{{ route('dashboard.groups.index') }}" role="button">назад</a>
        </div>

        {!! Form::open(['method' => 'patch' ,'url' => route('dashboard.groups.update', $group->id)]) !!}
        @include('dashboard.groups.blocks.form.fields')
        <div class="form-group">
            {!! Form::submit('Редагувати', ['class' => 'btn btn-success']); !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection
