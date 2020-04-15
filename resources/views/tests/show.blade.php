@extends('layouts.default')

@section('title', "Test # $test->id ")

@section('content')
{{--  @dump($test)--}}
  <div id="test">
    <test :test="{{ json_encode($test) }}"></test>
  </div>
@endsection

@push('scripts')
  <script src="{{ mix('/js/test.js') }}"></script>
@endpush
