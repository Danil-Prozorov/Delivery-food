@extends('layouts.Pub.layout')
@section('header')
  @include('layouts.Pub.header')
@endsection
@section('content')
  <section class='cart container'>
    <aside class="cart__header">
      <ul class="cart__header-list">
        <li><a href="{{route('cart.index')}}">Корзина ({{count($user->cart)}})</a></li>
        <li><a href='{{route('order.show')}}'>В процессе</a></li>
        <li><a href='#'>Завершёные</a></li>
      </ul>
    </aside>
    <aside class="cart__container">
        @if(count($user->cart) > 0)
          @foreach($user->cart as $item)
            <div class="cart__item-wrapper" id="product_{{$item->id}}">
              <div class="cart__item-image-wrapper">
                <img src="storage/{{$item->image_path}}" alt="food photo">
              </div>
              <div class="cart__item-description">
                <p>{{$item->product_name}}</p>
              </div>
              <div class="cart__item-controll-wrapper">
                <div class="cart__item-counter">
                    <form class="item__counter-form" action="{{route('cart.update',['id' => $item->id])}}" method="post" onsubmit="return minusItem(this,{{$item->id}});">
                      {{ csrf_field() }}
                      @method('PATCH')
                      <input type="hidden" name="product_id" value="{{$item->product_id}}">
                      <input type="hidden" name="id" value="{{$item->id}}">
                      <input type="hidden" name="operation" value="reduce">
                      <button class='cart__counter-button' type="submit" name="button">-</button>
                    </form>
                    <p id='item__counter-{{$item->id}}'>{{$item->product_count}}</p>
                    <form class="item__counter-form" action="{{route('cart.update',['id' => $item->id])}}" method="post" onsubmit="return addItem(this,{{$item->id}});">
                      {{ csrf_field() }}
                      @method('PATCH')
                      <input type="hidden" name="product_id" value="{{$item->product_id}}">
                      <input type="hidden" name="id" value="{{$item->id}}">
                      <input type="hidden" name="operation" value="increase">
                      <button class='cart__counter-button' type="submit" name="button">+</button>
                    </form>
                </div>
                <div class="cart__item-button-destroy">
                  <form class="item__counter-form" action="{{route('cart.destroy',['id' => $item->id])}}" method="post" onsubmit="return deleteItem(this);">
                    @csrf
                    @method('DELETE')
                    <button class='cart__item-cancel-btn' type='submit'><p>Отмена</p></button>
                  </form>
                </div>
              </div>
            </div>
          @endforeach
        @else
            <h1 class="empty-zone-text">Здесь пусто</h1>
        @endif
    </aside>
    <div class='confirm-order'>
        @if(count($user->cart) > 0)
            <a href="{{route('order.index')}}"><button type="button" name="button" class='button blue-button'>Подтвердить заказ</button></a>
        @endif
    </div>
  </section>
@endsection
@section('footer')
  @include('layouts.Pub.footer')
@endsection
