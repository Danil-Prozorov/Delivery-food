@extends('layouts.Pub.layout')
@section('header')
    @include('layouts.Pub.header')
@endsection
@section('content')
    <section class="container">
        <aside class="cart__header">
            <ul class="cart__header-list">
                <li><a href="{{route('cart.index')}}">Корзина ({{count($user->cart)}})</a></li>
                <li><a href='{{route('order.show')}}'>В процессе</a></li>
                <li><a href='#'>Завершёные</a></li>
            </ul>
        </aside>
        <h2 class="items-list-title">Список заказов</h2>
        @foreach($orders as $order)
            <div onclick="return showDetails({{$order->id}}, 'on')" class="item" id="order_{{$order->id}}">
                <div class="item__header">
                    <p class="item__header-ord-num">Заказ №{{$order->id}}</p>
                    <p class="item__header-ord-data">Дата {{$order->created_at}}</p>
                </div>
                <div class="item__details" id="order_details_{{$order->id}}">
                    @foreach($orderDetails as $detail)
                        @if($detail->order_id == $order->id)
                            <div class="item__detail">
                                <p>Ресторан: {{$detail->restaurant_name}}</p>
                                <p>Блюдо: {{$detail->item_name}}</p>
                                <p>Колл-во: {{$detail->item_count}}</p>
                                <p>Цена за штуку: {{$detail->price}}</p>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        @endforeach
    </section>
@endsection
@section('footer')
    @include('layouts.Pub.footer')
@endsection
