<?php

namespace App\Enums;

enum PermissionEnum: string
{
    case dashboard = "dashboard";
    case users = "users";
    case vaccine_certificate = "vaccine_certificate";
    case finance = "finance";
    case reports = "reports";
    case settings = "settings";
    case logs = "logs";
    case audit = "audit";
    case activity = "activity";
}
