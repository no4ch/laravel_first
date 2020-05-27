@extends('layouts.default')

@section('title', 'User profile')

@section('content')
    @parent
    <div class="container mt-3">
        @include('layouts.blocks.notifications.alert')
        <h1>User profile</h1>

        {!! Form::open(['method' => 'patch' ,'url' => route('profile', $user->id)]) !!}
        <div class="row">
            <div class="col-sm-12 col-md-6">

                <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', $user->name ?? null, ['class' => 'form-control']) !!}
                </div>

                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    {!! Form::label('email', "Email") !!}
                    {!! Form::text('email', $user->email ?? null, ['class' => 'form-control']) !!}

                </div>

                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    {!! Form::label('old-password', "Old password") !!}
                    {!! Form::password('old-password', ['class' => 'form-control']) !!}
                </div>

                @error('old-password')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    {!! Form::label('new-password', "New password") !!}
                    {!! Form::password('new-password', ['class' => 'form-control']) !!}
                </div>

                @error('new-password')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    {!! Form::label('confirm-new-password', "Confirm new password") !!}
                    {!! Form::password('confirm-new-password', ['class' => 'form-control']) !!}
                </div>

                @error('confirm-new-password')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-group">
            {!! Form::submit('Update', ['class' => 'btn btn-success']); !!}
        </div>
        {!! Form::close() !!}

    </div>
@endsection
