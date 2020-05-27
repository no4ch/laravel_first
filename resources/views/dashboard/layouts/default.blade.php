@extends('layouts.default')

@section('content')
  <div class="container-fluid">
    <div class="row">

      @include('dashboard.layouts.blocks.nav.index')

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10">
        @include('layouts.blocks.notifications.alert')
        @yield('dashboard-content')
      </main>
    </div>
  </div>
@endsection
