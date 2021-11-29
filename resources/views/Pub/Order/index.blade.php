@extends('layouts.Pub.layout')
@section('header')
  @include('layouts.Pub.header')
@endsection
@section('content')
<section class="order container">
  <aside class="cart__header">
    <ul class="cart__header-list">
      <li><a href="{{route('cart.index')}}">Корзина ({{count($user->cart)}})</a></li>
      <li><a href='#'>В процессе ()</a></li>
      <li><a href='#'>Завершёные ()</a></li>
    </ul>
  </aside>
  <aside class="order__list">
    <div class="order__back-link-wrapper">
      <a href="{{route('cart.index')}}" class='order__back-link'><img src='/images/back_arrow.svg'></a>
    </div>
    <div class="order__wrapper">
      @foreach($user->cart as $item)
        <div class="order__items">
          <ul class="order__item">
            <li class="order__name">Название: {{$item->product_name}}</li>
            <li class="order__counter"> Колл-во: {{$item->product_count}}</li>
            <li class="order__price">Цена: {{$item->product_count*$item->price}}&#8381;</li>
          </ul>
        </div>
      @endforeach
    </div>
  </aside>
  <aside class='price-line'>
    <p class='price-line__total-price bold'>Общая цена: {{$fullCost}}&#8381;</p>
  </aside>
  <aside class="order__submit-btn">
    <form class="order__send" action="index.html" method="post">
      @csrf
      <button type="button" name="button" class='button blue-button'>Заказать</button>
    </form>
  </aside>
</section>
@endsection
@section('footer')
  @include('layouts.Pub.footer')
@endsection
