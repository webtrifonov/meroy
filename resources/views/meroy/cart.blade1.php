@extends('meroy.layouts.base_template')
@section('header')
    @include('meroy.includes.header')
@endsection
@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/pretty-checkbox.min.css') }}">
<h2 class="header_text">Корзина</h2>
<form action="">
    <table class="cart_table">
        <thead>
            <tr>
                <td>#</td>
                <td>Наименование</td>
                <td>Цена</td>
                <td>Количество</td>
                <td>Итого</td>
                <td>Удалить</td>
            </tr>
        </thead>
        <tbody>
        @forelse($cartProducts as $k => $cartProduct)
            <tr>
                <td>{{ $k + 1 }}</td>
                <td>{{ $cartProduct->product->title }}</td>
                <td>{{ $cartProduct->product->price }} <span>{{ $cartProduct->product->currency->title }}</span></td>
                <td>
                    <div class="amount">
                        <div class="qty_number">
                            <input class="amount_number" type="text" value="{{ $cartProduct->amount }}">
                        </div>
                        <div class="qty_arrows">
                            <div class="qty_arrow qty_up_arrow"></div>
                            <div class="qty_arrow qty_down_arrow"></div>
                        </div>
                    </div>
                </td>
                <td>{{ $cartProduct->product->price * $cartProduct->amount }}</td>
                <td><div class="delete_from_cart_{{ $cartProduct->id }}" class="delete_from_cart"></div></td>
            </tr>
        @empty
            <p>Нет данных</p>
        @endforelse
        </tbody>    
    </table>
    
    <div class="row total_price_wrapper">
        <div class="col-12 col-sm-6 col-lg-7">
            <div class="mt15 pretty p-svg p-curve">
            <input type="checkbox" />
                <div class="state p-success">
                    <!-- svg path -->
                    <svg class="svg svg-icon" viewBox="0 0 20 20">
                        <path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z" style="stroke: white;fill:white;"></path>
                    </svg>
                    <label>Заказ доставки</label>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-5">
            <label><h3 class="total_price">Итого 1800руб</h3><input class="button_big" type="submit" value="Оформить"></label>
        </div>
    </div>
</form>
@endsection
@section('footer')
    @include('meroy.includes.footer')
@endsection