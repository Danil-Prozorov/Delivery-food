@extends('layouts.Pub.layout')
@section('header')
  @include('layouts.Pub.header')
@endsection
@section('content')

<section class='welcome-screen'>
  <h1>Delivery Food - лучшая еда, с доставкой на дом</h1>
  <a href="{{ route('restaurants.index') }}">Сделать заказ</a>
</section>
@endsection
@section('footer')
  @include('layouts.Pub.footer')
@endsection
