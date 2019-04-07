<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class UserRole extends Enum
{
    const Admin = 0;
    const Customer = 1;
    const StoreUser = 2;
}
