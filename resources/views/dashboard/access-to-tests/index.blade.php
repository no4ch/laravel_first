@extends('dashboard.layouts.default')

@section('title', 'Access to tests')

@section('dashboard-content')
    @parent
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Access to tests</li>
        </ol>
    </nav>

    <h1>Access to tests</h1>

    <a href="{{ route('dashboard.access-to-tests.create') }}" class="btn btn-primary">Add access</a>

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
                        Delete access
                    </button>
                </form>
            </div>
        @empty
            <p>No tests were issued for this group</p>
        @endforelse

        <hr>
    @empty
        <h2>Empty access</h2>
    @endforelse

@endsection
{{--<table class="table table-striped">--}}
{{--    <thead>--}}
{{--    <tr>--}}
{{--        <th scope="col">#</th>--}}
{{--        <th scope="col">Test name</th>--}}
{{--        <th scope="col">Updated at</th>--}}
{{--        <th scope="col">Status</th>--}}
{{--        <th scope="col">Actions</th>--}}
{{--    </tr>--}}
{{--    </thead>--}}
{{--    <tbody>--}}
{{--    @forelse($group->tests as $test)--}}
{{--        <td>{{ $test->id }}</td>--}}
{{--        <td></td>--}}
{{--        <td></td>--}}
{{--        <td></td>--}}
{{--        <td></td>--}}
{{--    </tbody>--}}

{{--    @empty--}}
{{--    @endforelse--}}
{{--</table>--}}
