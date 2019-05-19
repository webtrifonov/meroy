@extends('meroy.layouts.account_template')
@section('title', 'Заказы')

@section('header')
    @include('meroy.includes.header')
@endsection
@section('side_menu')
    @include('meroy.includes.account_menu')
@endsection
@section('content')
<h1 class="header_text">Мои заказы</h1>
@if ($customer->orders)
<table class="orders_table">
    <thead>
    <tr>
        <td>#</td>
        <td>№ заказа</td>
        <td>Общая стоимость</td>
        <td>Адрес доставки</td>
        <td>Статус</td>
        <td>Детали заказа</td>
    </tr>
    </thead>
    <tbody>
    @foreach ($customer->orders as $key => $order)
        <tr class="order_item_line">
            <td>{{ $key + 1 }}</td>
            <td>Заказ №{{ $order->id }}</td>
            <td>{{ $order->total_price.' руб.' }}</td>
            <td>
                @if ($order->address)
                    {{ $order->address }}
                @else
                    Самовывоз
                @endif
            </td>
            <td>
                @if ($order->status === 'Cancelled')
                    <p class="cancelled">Отменен</p>
                @elseif ($order->status === 'Placed')
                    <p class="placed">В обработке</p>
                @elseif ($order->status === 'Approved')
                    <p class="approved">Одобрен</p>
                @elseif ($order->status === 'Shipped')
                    <p class="shipped">Отправлен</p>
                @elseif ($order->status === 'Received')
                    <p class="received">Доставлен</p>
                @endif
            </td>
            <td>
                <div class="more_order_details"></div>
            </td>
        </tr>
        <tr>
            <td colspan="6">
                <table class="cart_items_table hidden">
                    <thead>
                    <tr>
                        <td>#</td>
                        <td>Наименование</td>
                        <td>Цена</td>
                        <td>Количество</td>
                        <td>Итого</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($order->cartProducts as $k => $cartProduct)
                        <tr  class="cart_item_line">
                            <td>{{ $k + 1 }}</td>
                            <td>{{ $cartProduct->product->title }}</td>
                            <td>{{ $cartProduct->product->price }}</td>
                            <td>{{ $cartProduct->amount }}</td>
                            <td>{{ $cartProduct->product->price * $cartProduct->amount.' руб.' }}</td>
                        </tr>
                    @endforeach
                    @if ($order->address)
                        <tr>
                            <td class="text-right" colspan="4">Доставка</td>
                            <td>{{ env('ADDRESS_PRICE') }} руб.</td>
                        </tr>
                    @endif
                    </tbody>

                </table>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@else
    <p class="empty">У вас пока нет заказов</p>
@endif

@endsection
@section('footer')
    @include('meroy.includes.footer')
@endsection