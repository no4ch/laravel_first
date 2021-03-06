@extends('dashboard.layouts.default')

@section('title', 'Create group')

@section('dashboard-content')
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard.') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('dashboard.groups.index') }}">Groups</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create group</li>
            </ol>
        </nav>

        <div class="jumbotron">
            <h1 class="display-4">Create group</h1>
            <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention
                            to featured content or information.</p>
            <a class="btn btn-primary btn-lg" href="{{ route('dashboard.groups.index') }}" role="button">Back</a>
        </div>

        {!! Form::open(['url' => route('dashboard.groups.store')]) !!}
        @include('dashboard.groups.blocks.form.fields')
        <div class="form-group">
            {!! Form::submit('Create', ['class' => 'btn btn-success']); !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection
