@extends('layouts.default')

@section('title', 'Результати')

@section('content')
    @parent
    <div class="container mt-3">
        {{--        @include('layouts.blocks.notifications.alert')--}}
        <h1>Результати</h1>
        <hr>
        <h2 class="my-4">{{ $user->name }}</h2>

        <table class="table table-striped">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Назва</th>
                <th scope="col">Питання</th>
                <th scope="col">Вірні відповіді</th>
                <th scope="col">% вірних відповідей</th>
            </tr>
            </thead>
            <tbody>
            @forelse($user->tests as $test)

                @forelse($test->results as $result)
                    <tr>
                        <td scope="row">{{ $test->name }}</td>
                        <td>{{ $result->answers }}</td>
                        <td>{{ $result->right_answers }}</td>
                        <td>{{ $result->percent }} %</td>
                    </tr>
                @empty
                @endforelse

            @empty
                <tr>
                    <td colspan="4">Tests have not passed yet</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
