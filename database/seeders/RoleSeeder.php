<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Enums\RoleEnum;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::factory()->create([
            "id" => RoleEnum::epi_super,
            "name" => "EPI Super"
        ]);
        Role::factory()->create([
            "id" => RoleEnum::epi_admin,
            "name" => "EPI Admin"
        ]);
        Role::factory()->create([
            "id" => RoleEnum::epi_user,
            "name" => "EPI User"
        ]);
        Role::factory()->create([
            "id" => RoleEnum::finance_super,
            "name" => "Finance Super"
        ]);
        Role::factory()->create([
            "id" => RoleEnum::finance_admin,
            "name" => "Finance Admin"
        ]);
        Role::factory()->create([
            "id" => RoleEnum::finance_user,
            "name" => "Finance User"
        ]);
        Role::factory()->create([
            "id" => RoleEnum::debugger,
            "name" => "Debugger"
        ]);
    }
}
