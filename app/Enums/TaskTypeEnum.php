<?php

namespace App\Enums\Type;

enum TaskTypeEnum: int
{
    case certificate_reciept = 1;
    case epi_user_registration = 2;
    case finance_user_registration = 3;
}
