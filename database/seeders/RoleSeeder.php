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
            "name" => "epi Super"
        ]);
        Role::factory()->create([
            "id" => RoleEnum::epi_admin,
            "name" => "epi Admin"
        ]);
        Role::factory()->create([
            "id" => RoleEnum::epi_user,
            "name" => "epi User"
        ]);
        Role::factory()->create([
            "id" => RoleEnum::finance_super,
            "name" => "finance Super"
        ]);
        Role::factory()->create([
            "id" => RoleEnum::finance_admin,
            "name" => "finance Admin"
        ]);
        Role::factory()->create([
            "id" => RoleEnum::finance_user,
            "name" => "finance User"
        ]);
        Role::factory()->create([
            "id" => RoleEnum::debugger,
            "name" => "debugger"
        ]);
    }
}
