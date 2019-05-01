@extends('meroy.layouts.base_template')
@section('header')
    @include('meroy.includes.header')
@endsection
@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/pretty-checkbox.min.css') }}">
<h2 class="header_text">Корзина</h2>
<form action="{{ route('customer.addOrder') }}" method="POST">
    @csrf
    <div style="display: none" class="cart_template">
    <table class="cart_table">
        <thead>
            <tr>
                <td>#</td>
                <td>Наименование</td>
                <td>Цена</td>
                <td>Количество</td>
                <td>Итого</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <tr class="cart_item_line hidden">
                <td class="cart_item_counter"></td>
                <td class="cart_item_title"></td>
                <td class="cart_item_price"></td>
                <td class="cart_item_amount">
                    <div class="amount">
                        <div class="qty_number">
                            <input class="amount_number" type="text" value="1">
                        </div>
                        <div class="qty_arrows">
                            <div class="qty_arrow qty_up_arrow"></div>
                            <div class="qty_arrow qty_down_arrow"></div>
                        </div>
                    </div>
                </td>
                <td class="cart_item_total_price"></td>
                <td class="cart_item_delete">
                    <div class="delete_cart_item" data-delete_cart_product></div>
                </td>
            </tr>
        </tbody>    
    </table>

    <div class="row total_price_wrapper">
        <div class="col-12 col-sm-6 col-lg-7">
            <div class="mt15 pretty p-svg p-curve">
            <input class="delivery_button" type="checkbox" />
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
            <label><h3 class="cart_total_price_text">Итого: <span class="cart_total_price"></span></h3></label><input class="button_big button_green checkout_button" type="submit">{{--Оформить</input>--}}
        </div>
    </div>
    </div>

    <div style="display: none" class="no_cart_items">
        <p>В вашей корзине ещё нет товаров.</p> <a href="{{ route('index') }}">Перейти к покупкам</a>
    </div>
    <div id="cart_items"></div>
</form>
@endsection
@section('script')
    <script src="{{ asset('assets/js/cart.js') }}"></script>
@endsection
@section('footer')
    @include('meroy.includes.footer')
@endsection