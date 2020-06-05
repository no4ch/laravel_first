@extends('dashboard.layouts.default')

@section('title', 'Перегляд тесту')

@section('dashboard-content')
    @parent
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard.') }}">Адмінка</a></li>
                <li class="breadcrumb-item active" aria-current="page">Перегляд тесту #{{ $test->id }}</li>
            </ol>
        </nav>
    </div>

    <div
        class=" pt-3 pb-2 mb-3 border-bottom ">
        <h1>{{ $test->name }}:</h1>
    </div>

    @include('dashboard.layouts.blocks.test.questions.table', $test)
@endsection
