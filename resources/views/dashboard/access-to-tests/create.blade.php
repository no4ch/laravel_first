@extends('dashboard.layouts.default')

@section('title', 'Створити доступ')

@section('dashboard-content')
    @parent
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard.') }}">Адмінка</a></li>
                <li class="breadcrumb-item"><a href="{{ route('dashboard.access-to-tests.index') }}">Доступи до тестів</a></li>
                <li class="breadcrumb-item active" aria-current="page">Створити доступ</li>
            </ol>
        </nav>

        {!! Form::open(['url' => route('dashboard.access-to-tests.store')]) !!}
        @include('dashboard.access-to-tests.blocks.form.fields')

        <div class="form-group">
            {!! Form::submit('Створити доступ', ['class' => 'btn btn-success']); !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection
