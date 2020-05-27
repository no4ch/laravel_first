@extends('dashboard.layouts.default')

@section('title', 'Dashboard')

@section('dashboard-content')
  @parent
  <div
    class="pt-3 pb-2 mb-3 border-bottom ">
    <h1>Dashboard</h1>
  </div>

  @if(!empty($tests))
    <div class="pb-3">
      <a class="btn btn-primary btn-lg" href="{{ route('dashboard.tests.create') }}" role="button">Add Test</a>
    </div>

    <div class="container-fluid">
      <table class="table table-striped">
        <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Test name</th>
          <th scope="col">Updated at</th>
          <th scope="col">Status</th>
          <th scope="col">Actions</th>
          <th></th>
        </tr>
        </thead>
        <tbody>
        @forelse($tests as $test)
          <tr>
            <td>{{ $test->id }}</td>
            <td><a href="{{ route('dashboard.tests.show', $test->id) }}">{{ $test->name }}</a></td>
            <td>{{ $test->updated_at }}</td>
            <td>{{ $test->status }}</td>
            <td>
              <a class="badge badge-primary pl-2 pr-2 pt-1 pb-1" href="{{ route('dashboard.tests.edit', $test->id) }}">Edit</a>
              <form id="destroy-form" action="{{ route('dashboard.tests.destroy', $test->id) }}" method="POST">
                @csrf
                @method('delete')
                <button class="badge badge-danger pl-2 pr-2 pt-1 pb-1" type="submit">Delete</button>
              </form>
            </td>
            <td>
              <a class="" data-toggle="collapse" href="#collapse{{ $loop->index }}" role="button"
                 aria-expanded="false" aria-controls="collapse{{ $loop->index }}">
                Show questions
              </a>
            </td>
          </tr>
          <tr>
            <td colspan="6">
              <div class="collapse" id="collapse{{ $loop->index }}">
                <div class="card card-body">
                  <div class="pb-3">
                    <a class="btn btn-primary btn-lg" href="{{ route("dashboard.tests.questions.create", $test->id) }}"
                       role="button">Add question</a>
                  </div>
                  @include('dashboard.layouts.blocks.test.questions.table', $test)
                </div>
              </div>
            </td>
          </tr>
        @empty
        @endforelse
        </tbody>
      </table>

      {{ $tests->links() }}
    </div>
  @else
    <div class="p-3 mb-2 bg-primary text-white">
      <h2>Tests empty</h2>
    </div>
  @endif
@endsection
