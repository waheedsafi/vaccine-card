<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Icons
        $dashboard = 'icons/home.svg';
        $users = 'icons/users-group.svg';
        $vaccine_certificate = 'icons/card.svg';
        $certificate_payment = 'icons/finance.svg';
        $reports = 'icons/chart.svg';
        $settings = 'icons/settings.svg';
        $logs = 'icons/logs.svg';
        $audit = 'icons/audits.svg';
        $activity = 'icons/activity.svg';

        Permission::factory()->create([
            "name" => "dashboard",
            "icon" => $dashboard,
            "priority" => 1,
        ]);
        Permission::factory()->create([
            "name" => "users",
            "icon" => $users,
            "priority" => 2,
        ]);
        Permission::factory()->create([
            "name" => "vaccine_certificate",
            "icon" => $vaccine_certificate,
            "priority" => 3,
        ]);
        Permission::factory()->create([
            "name" => "certificate_payment",
            "icon" => $certificate_payment,
            "priority" => 4,
        ]);
        Permission::factory()->create([
            "name" => "reports",
            "icon" => $reports,
            "priority" => 5,
        ]);
        Permission::factory()->create([
            "name" => "settings",
            "icon" => $settings,
            "priority" => 6,
        ]);
        Permission::factory()->create([
            "name" => "logs",
            "icon" => $logs,
            "priority" => 7,
        ]);
        Permission::factory()->create([
            "name" => "audit",
            "icon" => $audit,
            "priority" => 8,
        ]);
        Permission::factory()->create([
            "name" => "activity",
            "icon" => $activity,
            "priority" => 9,
        ]);
    }
}
