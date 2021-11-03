@extends('layouts.Pub.layout')
@section('header')
  @include('layouts.Pub.header')
@endsection
@section('slider')
  @include('layouts.Pub.slider')
@endsection
@section('content')
    <section class='content container'>
      <aside class='content__search-bar'>
        <h2>Рестораны</h2>
        <input type='text' name='rest_search' id='rest_search' placeholder="Поиск ресторанов">
      </aside>
      <aside>

      </aside>
    </section>
@endsection
@section('footer')
  @include('layouts.Pub.footer')
@endsection
