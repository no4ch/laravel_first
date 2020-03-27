@extends('layouts.default')

@section('title', 'Products')

@section('content')
  <main role="main">

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
      <div class="row">
        @forelse($products as $product)
          <div class="col-md-4">
            <h2>{{ $product['header'] }}</h2>
            <p>{{ $product['description'] }}</p>
            <p><a class="btn btn-secondary" href="/products/{{ $loop->index }}" role="button">{{ $product['button'] }} >></a></p>
          </div>
        @empty
          <h2>No products</h2>
        @endforelse
      </div>

      <hr>

    </div> <!-- /container -->

  </main>
@endsection
