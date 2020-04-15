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
        <th scope="col"></th>
      </tr>
      </thead>
      <tbody>
      @forelse($tests as $test)
        <tr>
          <td scope="row">{{ $test->id }}</td>
          <td>{{ $test->name }}</td>
          <td>{{ $test->questions_count }}</td>
          <td>
            Check test
          </td>
        </tr>
      @empty
        <h2>Тесты не были загружены</h2>
      @endforelse
      </tbody>
    </table>
    <hr>

  </div> <!-- /container -->
@endsection
