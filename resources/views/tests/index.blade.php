@extends('layouts.default')

@section('title', 'Tests')

@section('content')
  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Who use</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About us</a>
          </li>
        </ul>
      </div>
    </nav>
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
