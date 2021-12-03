@section('header')
    <nav class='navigation container'>
        <div class="navigation__wrap row col-12">
            <div class="navigation__logo">
              <a href='/restaurants'><img src="/images/logo.svg" alt="logo"></a>
            </div>
            <div class="navigation__adres-row-wrap">
               <input type="text" id="search" name="search" onchange="return writeAdresIntoForm(this)" placeholder="Адрес доставки">
               @error('search')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="navigation__buttons-wrap">
              @if(auth()->user())
                @auth
                  <ul class='navigation__logout-btn-wrap'>
                    <li class='navigation__logout-text' onclick="return dropDownItem()">{{ auth()->user()->name }} <span><img src='/images/downarrow_113600.svg'></span></li>
                    <li class='navigation__logout-btn' id='dd-off'>
                      <a id='dropItem' class="dropdown-item" href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                      </form></li>
                  </ul>
                  <a href="{{ route('cart.index') }}"><button class='button cart-btn white-button'>Корзина</button></a>
                @endauth
                @else
                  <a href="{{ route('login') }}"><button class='button login-btn blue-button'>Войти</button></a>
                  <a href="{{ route('cart.index') }}"><button class='button cart-btn white-button'>Корзина</button></a>
              @endif
            </div>
        </div>
    </nav>
@endsection
