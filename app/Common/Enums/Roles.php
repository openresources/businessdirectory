<?php

namespace App\Common\Enums;

use App\Common\Enums\Enum;

class Roles extends Enum
{
    const SUPER_ADMIN = 1;
    const ADMIN = 2;
    const USER = 3;
    const GUEST = 4;
}
