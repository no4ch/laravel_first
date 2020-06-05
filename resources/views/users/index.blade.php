@extends('layouts.default')

@section('title', 'Профіль користувача')

@section('content')
    @parent
    <div class="container mt-3">
        @include('layouts.blocks.notifications.alert')
        <h1>Профіль користувача</h1>

        {!! Form::open(['method' => 'patch' ,'url' => route('profile', $user->id)]) !!}

        @include('users.layouts.form.fields')

        <div class="form-group">
            {!! Form::submit('Редагувати', ['class' => 'btn btn-success']); !!}
        </div>
        {!! Form::close() !!}

    </div>
@endsection
