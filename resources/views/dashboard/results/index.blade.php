@extends('dashboard.layouts.default')

@section('title', 'Результати')

@section('dashboard-content')
    @parent
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.') }}">Адмінка</a></li>
            <li class="breadcrumb-item active" aria-current="page">Результати</li>
        </ol>
    </nav>

    <h1>Результати</h1>
    <hr>

    @forelse($groups as $group)
        <h2 class="my-3">{{ $group->name }} </h2>

        @forelse($group->users as $user)
            <div class="mx-2">
                @if(count($user->tests) < 1)
                    <p>{{ $user->name }}</p>
                @else
                    <a data-toggle="collapse" href="#collapse{{ $loop->index }}" role="button"
                       aria-expanded="false" aria-controls="collapse{{ $loop->index }}">
                        {{ $user->name }} ({{ count($user->tests) }} tests)
                    </a>
                    <div class="collapse" id="collapse{{ $loop->index }}">
                        <div class="card card-body">
                            <table class="table">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Ім'я</th>
                                    <th scope="col">Відповідей</th>
                                    <th scope="col">Вірні відповіді</th>
                                    <th scope="col">% правильних відповідей</th>
                                    <th scope="col">Пройдений</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($user->tests as $test)
                                    @forelse($test->results as $result)
                                        @if(($result->user_id == $user->id) && ($result->test_id == $test->id))
                                        <tr>
                                            <td scope="row">{{ $result->id }}</td>
                                            <td scope="row">{{ $test->name }}</td>
                                            <td>{{ $result->answers }}</td>
                                            <td>{{ $result->right_answers }}</td>
                                            <td>{{ $result->percent }} %</td>
                                            <td>
                                                {{ $result->created_at ? $result->created_at->diffForHumans() : 'дата не вказана' }}
{{--                                                {{ @date_format($result->created_at, 'G:H:s m-d-y') }}--}}
                                            </td>
                                        </tr>
                                        @endif
                                    @empty
                                    @endforelse
                                @empty
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
            </div>
        @empty
            <p>Користувачі в цій группі відсутні</p>
        @endforelse

        <hr>
    @empty
        <h2>Пусті результати</h2>
    @endforelse

@endsection

