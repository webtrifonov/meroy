<?php

use App\Enums\OrderStatus;
use App\Enums\UserRole;

return [
    OrderStatus::class => [
        OrderStatus::Cancelled => 'Отменен',
        OrderStatus::Placed => 'В обработке',
        OrderStatus::Approved => 'Одобрен',
        OrderStatus::Shipped => 'Отправлен',
        OrderStatus::Received => 'Доставлен',
    ],
    UserRole::class => [
        UserRole::Admin => 'Администратор',
        UserRole::Customer => 'Покупатель',
        UserRole::StoreUser => 'Сотрудник магазина',
    ],

];