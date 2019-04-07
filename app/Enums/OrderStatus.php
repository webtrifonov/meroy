<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class OrderStatus extends Enum
{
    const Cancelled = 0;
    const Placed = 1;
    const Approved = 2;
    const Shipped = 3;
    const Received = 4;

}
