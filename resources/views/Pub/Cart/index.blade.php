@extends('layouts.Pub.layout')
@section('header')
  @include('layouts.Pub.header')
@endsection
@section('content')
  <section class='cart container'>
    <aside class="cart__header">
      <ul class="cart__header-list">
        <li><a href="{{route('cart.index')}}">Корзина</a></li>
        <li><a href='#'>В процессе</a></li>
        <li><a href='#'>Завершёные</a></li>
      </ul>
    </aside>
    <aside class="cart__container">
      @foreach($user->cart as $item)
        <div class="cart__item-wrapper">
          <div class="cart__item-image-wrapper">
            <img src="storage/{{$item->image_path}}" alt="food photo">
          </div>
          <div class="cart__item-description">
            <p>{{$item->product_name}}</p>
          </div>
          <div class="cart__item-controll-wrapper">
            <div class="cart__item-counter">
                <form class="item__counter-form" action="{{route('cart.update',['id' => $item->id])}}" method="post" onsubmit="return minusItem(this);">
                  {{ csrf_field() }}
                  @method('PATCH')
                  <input type="hidden" name="product_id" value="{{$item->product_id}}">
                  <input type="hidden" name="id" value="{{$item->id}}">
                  <input type="hidden" name="operation" value="reduce">
                  <button type="submit" name="button">-</button>
                </form>
                <p id='item__counter'>{{$item->product_count}}</p>
                <form class="item__counter-form" action="{{route('cart.update',['id' => $item->id])}}" method="post" onsubmit="return addItem(this);">
                  {{ csrf_field() }}
                  @method('PATCH')
                  <input type="hidden" name="product_id" value="{{$item->product_id}}">
                  <input type="hidden" name="id" value="{{$item->id}}">
                  <input type="hidden" name="operation" value="increase">
                  <button type="submit" name="button">+</button>
                </form>
            </div>
            <div class="cart__item-button-destroy">
              <button><p>Отмена</p></button>
            </div>
          </div>
        </div>
      @endforeach
    </aside>
  </section>
@endsection
@section('footer')
  @include('layouts.Pub.footer')
@endsection
