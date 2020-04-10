@extends('dashboard.layouts.default')

@section('title', 'Tests')

@section('dashboard-content')

  <div class="">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tests</li>
      </ol>
    </nav>

    <div class="jumbotron">
      <h1 class="display-4">Tests</h1>
      <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention
                      to featured content or information.</p>
      <a class="btn btn-primary btn-lg" href="{{ route('dashboard.tests.create') }}" role="button">Add Test</a>
    </div>

    <table class="table table-striped">
      <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Description</th>
        <th scope="col">Created at</th>
      </tr>
      </thead>
      <tbody>
      @forelse($tests as $test)
        <tr>
          <th scope="row">{{ $test->id }}</th>
          <td>{{ $test->name }}</td>
          <td>{{ $test->description??"Описание отсутствует" }}</td>
          <td>{{ $test->created_at }}</td>
        </tr>
      @empty
      @endforelse
      </tbody>
    </table>

    {{ $tests->links() }}
  </div>
@endsection
