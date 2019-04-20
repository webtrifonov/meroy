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
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if (! empty($orders))
                        <table class="table">
                            <thead>
                            <tr>
                                <td><b>#</b></td>
                                <td><b>Артикул</b></td>
                                <td><b>Покупатель</b></td>
                                <td><b>Адрес доставки</b></td>
                                <td><b>Статус</b></td>
                                <td><b>Общая стоимость</b></td>
                                <td><b>Дата создания</b></td>
                                <td><b>Дата обновления</b></td>
                                <td><b>Товары</b></td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($orders as $k => $order)
                                <tr>
                                    <td>{{ $k+1 }}</td>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->user->surname }} {{ $order->user->name }}</td>
                                    <td>
                                        @if ($order->address)
                                            {{ $order->address }}
                                        @else
                                            <p>Нет адреса</p>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($order->status === 'Cancelled')
                                            Отменен
                                        @elseif ($order->status === 'Placed')
                                            Размещен
                                        @elseif ($order->status === 'Approved')
                                            Утвержден
                                        @elseif ($order->status === 'Shipped')
                                            Отправлен
                                        @elseif ($order->status === 'Received')
                                            Доставлен
                                        @endif
                                    </td>
                                    <td>{{ $order->total_price }}</td>
                                    <td>{{ $order->created_at }}</td>
                                    <td>{{ $order->updated_at }}</td>
                                    <td><a href="#" class="admin_all_products">Товары заказа</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @else
                            <p>Нет заказов</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection