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
                                <td><b>Статус</b></td>
                                <td><b></b></td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($orders as $key => $order)
                                <tr class="order_item_line">
                                    <td>{{ $key + 1 }}</td>
                                    <td>№{{ $order->id }}</td>
                                    <td>{{ $order->user->surname.' '.$order->user->name.' '.$order->user->patronymic }}</td>
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
                                        <div class="more_order_details"><a href="{{ route('order.show', $order->id) }}" >Подробнее...</a></div>
                                    </td>
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