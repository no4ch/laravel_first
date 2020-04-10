@extends('layouts.default')

@section('title', 'Users')

@section('content')

  <div class="container">
    <h1 class="display-3">Users who trust us:</h1>
    <ul class="list-group">
      @forelse($users as $user)
        <li class="list-group-item">
          <h3>Name: {{ $user['name'] }}</h3>
          <p><strong>Email:</strong> {{ $user['email'] }}</p>
        </li>
      @empty
        <li class="list-group-item">Empty list</li>
      @endforelse
    </ul>
  </div>
@endsection
