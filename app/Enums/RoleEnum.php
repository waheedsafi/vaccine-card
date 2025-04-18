<?php

namespace App\Enums;

enum RoleEnum: int
{
    case epi_super = 1;
    case epi_admin = 2;
    case epi_user = 3;
    case finance_super = 4;
    case finance_admin = 5;
    case finance_user = 6;
    case debugger = 7;

    public static function getList(): array
    {
        return array_column(
            array_filter(self::cases(), fn($role) => $role !== self::debugger),
            'value',
            'name'
        );
    }
}
