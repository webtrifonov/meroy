<div class="header">
    <div class="row justify-content-between align-items-center text-center">
        <div class="col-sm-auto">
            <a class="logo" href="{{ route('index') }}"><img src="{{asset('assets/images/meroy.svg')}}" alt=""></a>
        </div>
        <div class="col-12 col-sm-8 col-lg-6">
            <form class="search_form bottom-block" action="{{ route('search') }}">
                <input class="search_text" name="search" type="search" placeholder="Искать товар..."/>
                <button class="search_button">Поиск</button>
            </form>
        </div>
        <div class="col-12 col-sm-12 col-lg-4">
            <div class="auth_wrapper">
                <p><a href="{{ route('customer.login') }}">Вход</a></p>
                <p><a href="{{ route('customer.register') }}">Регистрация</a></p>
                <p><a href="{{ route('customer.account') }}">Мой аккаунт</a></p>
                <h3><a href="{{ route('admin.index') }}">Auth</a></h3>
            </div>
            <div class="cart_wrapper">
                <a href="{{ route('cart') }}" class="cart_icon">
                    <span id="cart_count">0</span>
                    <img src="{{ asset('assets/images/cart_icon.png') }}" alt="">
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <nav class="top_menu">
                <ul>
                    <li><a href="{{ route('index') }}">Главная</a>
                    <li><a href="{{ route('about') }}">О магазине</a>
                    <li><a href="{{ route('delivery') }}">Доставка</a>
                    <li><a href="{{ route('contacts') }}">Контакты</a>
                </ul>
            </nav>
        </div>
    </div>
</div>