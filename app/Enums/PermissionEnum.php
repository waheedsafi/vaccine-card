<?php

namespace App\Enums;

enum PermissionEnum: string
{
    case dashboard = "dashboard";
    case users = "users";
    case vaccine_certificate = "vaccine_certificate";
    case certificate_payment = "certificate_payment";
    case reports = "reports";
    case settings = "settings";
    case logs = "logs";
    case audit = "audit";
    case activity = "activity";
}
