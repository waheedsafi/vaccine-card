<?php

namespace App\Enums;

enum StatusTypeEnum: int
{
    case payment = 1;
    case no_payment = 2;
    case paid = 3;
    case unpaid = 4;
}
