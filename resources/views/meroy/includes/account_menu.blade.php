<aside class="account_menu">
    <h3>{{ $customer->surname.' '.$customer->name.' '.$customer->patronymic }}</h3>
    <ul>
        <li><a href="{{ route('customer.account') }}">Мои заказы</a></li>
        <li><a href="{{ route('customer.personal') }}">Мой профиль</a></li>
        <li><a href="{{ route('customer.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Выйти</a></li>
    </ul>
    <form id="logout-form" action="{{ route('customer.logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</aside>