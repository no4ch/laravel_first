@extends('layouts.default')

@section('title', 'About us')

@section('content')


    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <h1>@lang('about.name')</h1>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">

              @forelse(trans('about.description') as $description)
                <p>{{ $description }}</p>
              @empty
                <p>Error</p>
              @endforelse
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
              <img style="max-width: 400px; max-height: 400px;"
                   src="https://avatars0.githubusercontent.com/u/49817056?s=460&u=78eb762d9a2130e2c9bf313a0cce885c259ac945&v=4">
            </div>
          </div>
        </div>

        <div class="container">
          <div class="row">
            <div class="col-12">
              <h2>@lang('about.contacts')</h2>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-12">
              @php
                $contacts = trans("about.contactsList");
                $counter = 0;
              @endphp
              <p>{{ $contacts[$counter++] }}: 8800 555 35 35</p>
              <p>{{ $contacts[$counter++] }}: <a href="mailto: vk202164356@gmail.com">vk202164356@gmail.com</a></p>
              <p>{{ $contacts[$counter++] }}: your_friend407975</p>
              <p>{{ $contacts[$counter++] }}: <a href="https://t.me/no4ch" target="_blank">@no4ch</a></p>
              <p>{{ $contacts[$counter++] }}: <a href="https://vk.com/id_no4ch" target="_blank">Serafym Topal</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection
