@extends('dashboard.layouts.default')

@section('title', 'Create access')

@section('dashboard-content')
    @parent
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard.') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('dashboard.access-to-tests.index') }}">Access to tests</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add access</li>
            </ol>
        </nav>

        {!! Form::open(['url' => route('dashboard.access-to-tests.store')]) !!}
        @include('dashboard.access-to-tests.blocks.form.fields')

        <div class="form-group">
            {!! Form::submit('Create access', ['class' => 'btn btn-success']); !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection
