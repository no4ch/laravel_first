@extends('dashboard.layouts.default')

@section('title', 'Доступи до тестів')

@section('dashboard-content')
    @parent
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.') }}">Адмінка</a></li>
            <li class="breadcrumb-item active" aria-current="page">Доступи до тестів</li>
        </ol>
    </nav>

    <h1>Доступи до тестів</h1>

    <a href="{{ route('dashboard.access-to-tests.create') }}" class="btn btn-primary">Додати доступ</a>

    <hr>

    @forelse($groups as $group)
        <h2 class="my-3">{{ $group->name }} </h2>

        @forelse($group->tests as $test)
            <div class="row ml-2 py-2">
                <a href="{{ route('dashboard.tests.show', $test->id) }}" class="mr-2">{{ $test->name }}</a>
                <form id="destroy-form"
                      action="{{ route('dashboard.access-to-tests.destroy', $group->id) }}"
                      method="POST">
                    @csrf
                    @method('delete')
                    <input type="hidden" name="test_id" value="{{ $test->id }}">
                    <button class="badge badge-danger pl-2 pr-2 pt-1 pb-1" type="submit">
                        Видалити доступ
                    </button>
                </form>
            </div>
        @empty
            <p>Доступи до тестів відсутні для цієї групи</p>
        @endforelse

        <hr>
    @empty
        <h2>Доступи пусті</h2>
    @endforelse

@endsection
