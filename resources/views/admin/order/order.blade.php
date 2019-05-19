@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                @include('layouts.adminmenu')
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header"><h3>Заказы покупателей</h3></div>
                    <div class="card-body">
                        <form action="{{ route('order.update', $order->id) }}" method="POST">
                            @csrf
                            @method('PATCH')

                        <h2>Заказ №{{ $order->id }}</h2>
                        <h4>Покупатель: {{ $order->user->surname.' '.$order->user->name.' '.$order->user->patronymic }}</h4>

                        <div class="form-group">
                            <label>Статус</label>
                            <select name="status" class="form-control">
                                @foreach (\App\Enums\OrderStatus::getValues() as $statusKey)
                                    <option
                                            value="{{ \App\Enums\OrderStatus::getKey($statusKey) }}"
                                            @if ($order->status ==  \App\Enums\OrderStatus::getKey($statusKey))
                                            selected
                                            @endif
                                    >{{ \App\Enums\OrderStatus::getDescription($statusKey) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="address">Адрес:</label>
                            <input name="address" type="text" class="form-control" value=
                                   @if ($order->address)"{{ $order->address }}" @else "Самовывоз" disabled @endif>
                        </div>
                        <h3>Товары заказа</h3>
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
                            {{$order->cartItems}}
                            @foreach ($order->cartProducts as $k => $cartProduct)
                                <tr  class="cart_item_line" data-product="{{ $cartProduct->id }}">
                                    <td>{{ $k + 1 }}</td>
                                    <td>{{ $cartProduct->product->title }}</td>
                                    <td>{{ $cartProduct->product->price.'руб' }}</td>
                                    <td>{{ $cartProduct->amount }}</td>
                                    <td>{{ $cartProduct->product->price * $cartProduct->amount.'руб.' }}</td>
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
                        <h4 class="text-right">Общая сумма: {{ $order->total_price }}</h4>
                        <input type="submit" class="btn btn-warning" value="Изменить">
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection