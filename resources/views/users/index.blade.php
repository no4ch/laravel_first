@extends('layouts.default')

@section('title', 'Users')

@section('content')
  <main role="main">

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1 class="display-3">Users who trust us:</h1>
        <ul class="list-group">
          @forelse($users as $user)
            <li class="list-group-item">
              <h3>Name: {{ $user['name'] }}</h3>
              <p><strong>Review:</strong> {{ $user['review'] }}</p>
              <span>Stars: <strong>{{ $user['stars'] }}</strong></span>
            </li>
          @empty
            <li class="list-group-item">Empty list</li>
          @endforelse
        </ul>
      </div>
    </div>


  </main>
@endsection
