@extends('layouts.default')

@section('title', 'Tests')

@section('content')


  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="jumbotron">
    <div class="container">
      <h1 class="display-3">Hello, world!</h1>
      <p>This is a template for a simple marketing or informational website. It includes a large callout called a
         jumbotron and three supporting pieces of content. Use it as a starting point to create something more
         unique.</p>
      <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
    </div>
  </div>

  <div class="container">
    <!-- Example row of columns -->
    <table class="table">
      <thead class="thead-light">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col"></th>
      </tr>
      </thead>
      <tbody>
      @forelse($tests as $test)
        <tr>
          <td scope="row">{{ $test->id }}</td>
          <td>{{ $test->name }}</td>
          <td>
            Пройти тест>
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
