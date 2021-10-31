<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="/css/style.css">
        <title>Delivery Food-доставка еды</title>
    </head>
<body>
  <header>
     @yield('header')
  </header>
  @yield('slider')
  <main>
     @yield('content')
  </main>
  <footer>
     @yield('footer')
  </footer>
</body>
</html>
