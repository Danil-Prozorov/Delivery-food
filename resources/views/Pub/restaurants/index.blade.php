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
    </aside>
    <aside class='content__restaurants'>
      @foreach($restaurant->all() as $rest)
        <div class="content__restauran">
          <a href="{{route('restaurants.show',['restaurant' => $rest->id])}}">
            <div class="content__previev-photo">
              <img src="/storage/{{$rest->image_path}}" alt="previev">
            </div>
            <div class="content__restauran-details">
              <div class="content__restaurant-header">
                <h3 class='content__restauran-name'>{{$rest->restaurant_name}}</h3>
                <p class='content__delivery-time'>50 мин</p>
              </div>
              <div class="content__stats">
                 <span><img src="/images/litle_star.svg"> {{$rest->stars}}</span>
                 @if(count($rest->restaurants_products) != 0)
                  <p>От {{ $rest->restaurants_products->min('price') }}&#8381; &bull; {{$rest->restaurant_name}}</p>
                 @endif
              </div>
            </div>
          </a>
        </div>
      @endforeach
    </aside>
  </section>
@endsection
@section('footer')
  @include('layouts.Pub.footer')
@endsection
