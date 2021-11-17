<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="/css/style.css">
        <link href="images/logo.svg" rel="shortcut icon">
        <title>Delivery Food-доставка еды</title>
    </head>
<body>
  <header>
     @yield('header')
  </header>
  <main>
    <section class='container'>
      @yield('slider')
    </section>
     @yield('content')
  </main>
  <footer>
     @yield('footer')
  </footer>
  <script src="{{asset('js/slider.js') }}"></script>
  <script src="{{asset('js/script.js') }}"></script>
  <script src="{{asset('js/sendJsonRequest.js') }}"></script>
</body>
</html>
