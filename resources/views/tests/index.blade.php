@extends('layouts.default')

@section('title', 'Tests')

@section('content')
  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="container">
    <br><br>
    <!-- Example row of columns -->
    <table class="table">
      <thead class="thead-light">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Questions</th>
      </tr>
      </thead>
      <tbody>
      @forelse($tests as $test)
        <tr>
          <td scope="row">{{ $test->id }}</td>
          <td>
            <a href="{{ route('tests.', $test->id) }}">{{ $test->name }}</a>
          </td>
          <td>{{ $test->questions_count }}</td>
        </tr>
      @empty
        <h2>Тесты не были загружены</h2>
      @endforelse
      </tbody>
    </table>
    <hr>
    {{ $tests->links() }}
  </div> <!-- /container -->
@endsection
