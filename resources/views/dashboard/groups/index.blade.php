@extends('dashboard.layouts.default')

@section('title', 'Групи')

@section('dashboard-content')
    @parent
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard.') }}">Адмінка</a></li>
                <li class="breadcrumb-item active" aria-current="page">Групи</li>
            </ol>
        </nav>
    </div>
    <div
        class="mb-3 border-bottom">
        <h1>Групи</h1>
    </div>

    @if(!empty($groups))
        <div class="pb-3">
            <a class="btn btn-primary btn-lg" href="{{ route('dashboard.groups.create') }}" role="button">Створити групу</a>
        </div>

        <div class="container-fluid">
            <table class="table table-striped border-bottom">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Ім'я</th>
                    <th>Дії</th>
                </tr>
                </thead>
                <tbody>
                @forelse($groups as $group)
                    <tr>
                        <td>{{ $group->id }}</td>
                        <td><a href="{{ route('dashboard.groups.edit', $group->id) }}">{{ $group->name }}</a></td>
                        <td>
                            <form id="destroy-form"
                                  action="{{ route('dashboard.groups.destroy', $group->id) }}"
                                  method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger pl-2 pr-2 pt-1 pb-1" type="submit">Видалити
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                @endforelse
                </tbody>
            </table>
        </div>
    @else
        <div class="p-3 mb-2">
            <h2>Groups empty</h2>
            <div class="pb-3">
                <a class="btn btn-primary btn-lg" href="{{ route('dashboard.groups.create') }}" role="button">Add Group</a>
            </div>
        </div>
    @endif


@endsection
