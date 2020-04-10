@extends('layouts.default')

@section('title', 'Product: '.$product['header'])

@section('content')
  <div class="jumbotron">
    <div class="container">
      <h1 class="display-3">{{ $product['header'] }}</h1>
      @for($i=0; $i<3; $i++)
        <p>{{$product['description']}}</p>
      @endfor
      <p><a class="btn btn-primary btn-lg" href="#" role="button">{{ $product['button'] }} >></a></p>
    </div>
  </div>
@endsection
