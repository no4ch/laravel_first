<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title', 'No Name')</title>
  <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
  <style>
    .top-right {
      position: absolute;
      right: 10px;
      top: 18px;
    }

    .links > a {
      color: #f5f5f5;
      padding: 0 25px;
      font-size: 13px;
      font-weight: 600;
      letter-spacing: .1rem;
      text-decoration: none;
      text-transform: uppercase;
    }
  </style>
</head>
<body>

@include('layouts.blocks.nav.index')

<main role="main">
{{--  <div class="jumbotron">--}}
    @yield('content')
{{--  </div>--}}
</main>

@include('layouts.blocks.footer.index')

<script src="{{ mix('/js/app.js') }}"></script>

</body>
</html>
