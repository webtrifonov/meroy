@extends('meroy.layouts.base_template')
@section('title', 'Корзина')
@section('header')
    @include('meroy.includes.header')
@endsection
@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/pretty-checkbox.min.css') }}">
<h2 class="header_text">Корзина</h2>
{{--<form action="{{ route('customer.addOrder') }}" method="POST">--}}
    {{--@csrf--}}
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
</div>
<div id="cart_items"></div>
<div id="total_price_template">
<div  class="row total_price_wrapper">
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
        <div>
            <span class="address_price">(Стоимость доставки {{ env('ADDRESS_PRICE') }} руб.)</span>
        </div>
        <div id="address_template" class="hidden">
            <div class="form_item row">
                <div class="form_item-label_wrapper col-12">
                    <label class="form_item-label" for="address">Адрес доставки</label>
                </div>
                <div class="form_item-input_wrapper col-12">
                    <input id="address_field" class="form_item-input" name="address" type="text" value=""/>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-lg-5">
        <label><h3 class="cart_total_price_text">Итого: <span class="cart_total_price">0</span><span>руб.</span></h3></label><input class="button_big button_green checkout_button" type="submit" data-checkout>{{--Оформить</input>--}}
    </div>
</div>
</div>

<div style="display: none" class="no_cart_items">
    <p>В вашей корзине ещё нет товаров.</p> <a href="{{ route('index') }}">Перейти к покупкам</a>
</div>

<div class="modal fade" id="success_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                {{--<h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>--}}
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="modal-image">
                    <img src="{{ asset('assets/images/icons/modal_success.png') }}" alt="">
                </div>
                <div class="modal-text">
                    <h3>Ваш заказ успешно оформлен</h3>
                    <p>Перейдите к заказам, чтобы отслеживать изменения</p>
                </div>
            </div>
            <div class="modal_buttons">
                <div class="row">
                    <div class="col-6">
                        <a href="{{ route('index') }}">Вернуться на главную</a>
                    </div>
                    <div class="col-6">
                        <a href="{{ route('customer.account') }}">К заказам</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{--</form>--}}
@endsection
@section('script')
    <script src="{{ asset('assets/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/js/cart.js') }}"></script>
@endsection
@section('footer')
    @include('meroy.includes.footer')
@endsection