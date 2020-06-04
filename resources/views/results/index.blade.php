@extends('layouts.default')

@section('title', 'Results')

@section('content')
    @parent
    <div class="container mt-3">
        {{--        @include('layouts.blocks.notifications.alert')--}}
        <h1>Results</h1>
        <hr>
        <h2 class="my-4">{{ $user->name }}</h2>

        <table class="table table-striped">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Answers</th>
                <th scope="col">Right answers</th>
                <th scope="col">% correct answers</th>
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
