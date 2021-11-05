@extends('layouts.Pub.layout')
@section('header')
  @include('layouts.Pub.header')
@endsection
@section('content')
  <section class='content container'>
    <aside class='content__search-bar'>
      <h2>{{$restaurant->restaurant_name}}</h2>
      @if(count($restaurant->restaurants_products) != 0)
        <div class='content__stats'>
          <span><img src="/images/litle_star.svg"> {{$restaurant->stars}}</span>
          <p>От {{ $restaurant->restaurants_products->min('price') }}&#8381; &bull; {{$restaurant->restaurant_name}}</p>
        </div>
      @endif
    </aside>
      @if(count($restaurant->restaurants_products) == 0)
        <h1>Пока что тут ничего нет</h1>
        @else
        <aside class='content__restaurants'>
          @foreach($restaurant->restaurants_products as $prod)
            <div class="content__restauran">
                <div class="content__previev-photo">
                  <img src="/storage/{{$prod->image_path}}" alt="previev">
                </div>
                <div class="content__restauran-details">
                  <div class="content__restaurant-header">
                    <h3 class='content__restauran-name'>{{$prod->product_name}}</h3>
                  </div>
                  <div class="content__product-component">
                    <p>{{$prod->ingredients}}</p>
                  </div>
                  <div>
                    <button id="product_{{$prod->id}}" class="button blue-button">В корзину</button>
                    <p>{{$prod->price}}&#8381;</p>
                  </div>
                </div>
            </div>
          @endforeach
        </aside>
      @endif
  </section>
@endsection
@section('footer')
  @include('layouts.Pub.footer')
@endsection
