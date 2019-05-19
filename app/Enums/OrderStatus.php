<?php

namespace App\Enums;

use BenSampo\Enum\Enum;
use BenSampo\Enum\Contracts\LocalizedEnum;

final class OrderStatus extends Enum implements LocalizedEnum
{
    const Cancelled = 0;
    const Placed = 1;
    const Approved = 2;
    const Shipped = 3;
    const Received = 4;

}
