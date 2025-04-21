<?php

namespace App\Enums;

enum CheckListEnum: int
{
    case finance_reciept = 1;
    case epi_user_letter_of_introduction = 2;
    case finance_user_letter_of_introduction = 3;
    case epi_letter_of_password_change = 4;
    case finance_letter_of_password_change = 5;
}
