<div class="row">
    <div class="col-sm-12 col-md-6">

        <div class="form-group">
            {!! Form::label('name', 'Ім\'я') !!}
            {!! Form::text('name', $user->name ?? null, ['class' => 'form-control']) !!}
        </div>

        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            {!! Form::label('email', "Пошта") !!}
            {!! Form::text('email', $user->email ?? null, ['class' => 'form-control']) !!}

        </div>

        @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            {!! Form::label('old-password', "Старий пароль") !!}
            {!! Form::password('old-password', ['class' => 'form-control']) !!}
        </div>

        @error('old-password')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            {!! Form::label('password', "Новий пароль") !!}
            {!! Form::password('new-password', ['class' => 'form-control']) !!}
        </div>

        @error('new-password')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            {!! Form::label('confirm-new-password', "Підтвердження нового паролю") !!}
            {!! Form::password('confirm-new-password', ['class' => 'form-control']) !!}
        </div>

        @error('password_confirmation')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
</div>
