<?php

namespace Database\Seeders;

use App\Enums\LanguageEnum;
use App\Models\User;
use App\Models\Email;
use App\Enums\RoleEnum;
use App\Enums\ZoneEnum;
use App\Models\Contact;
use App\Models\EpiUser;
use App\Models\FinanceUser;
use App\Models\ModelJob;
use App\Models\ModelJobTrans;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class JobAndUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $job = ModelJob::factory()->create([]);
        ModelJobTrans::factory()->create([
            "value" => "Administrator",
            "model_job_id" => $job->id,
            "language_name" => LanguageEnum::default->value,
        ]);
        ModelJobTrans::factory()->create([
            "value" => "مدیر اجرایی",
            "model_job_id" => $job->id,
            "language_name" => LanguageEnum::farsi->value,
        ]);
        ModelJobTrans::factory()->create([
            "value" => "اجرایی مدیر",
            "model_job_id" => $job->id,
            "language_name" => LanguageEnum::pashto->value,
        ]);
        $jobs = [
            'Finance' => [
                'Super Admin' => [
                    'farsi' => 'مدیر ارشد مالی',
                    'pashto' => 'د مالي عالي مدیر',
                ],
                'Admin' => [
                    'farsi' => 'مدیر مالی',
                    'pashto' => 'د مالي مدیر',
                ],
                'User' => [
                    'farsi' => 'کاربر مالی',
                    'pashto' => 'د مالي کاروونکی',
                ],
            ],
            'EPI' => [
                'Super Admin' => [
                    'farsi' => 'مدیر ارشد ای پی آی',
                    'pashto' => 'د ای پي آی عالي مدیر',
                ],
                'Admin' => [
                    'farsi' => 'مدیر ای پی آی',
                    'pashto' => 'د ای پي آی مدیر',
                ],
                'User' => [
                    'farsi' => 'کاربر ای پی آی',
                    'pashto' => 'د ای پي آی کاروونکی',
                ],
            ],
        ];
        
        foreach ($jobs as $department => $roles) {
            foreach ($roles as $role => $translations) {
                $job = ModelJob::factory()->create([]);
        
                // Default (English)
                ModelJobTrans::factory()->create([
                    'value' => "$department $role",
                    'model_job_id' => $job->id,
                    'language_name' => LanguageEnum::default->value,
                ]);
        
                // Farsi
                ModelJobTrans::factory()->create([
                    'value' => $translations['farsi'],
                    'model_job_id' => $job->id,
                    'language_name' => LanguageEnum::farsi->value,
                ]);
        
                // Pashto
                ModelJobTrans::factory()->create([
                    'value' => $translations['pashto'],
                    'model_job_id' => $job->id,
                    'language_name' => LanguageEnum::pashto->value,
                ]);
            }
        }
        










        $epiEmail =  Email::factory()->create([
            "value" => "epi@super.com"
        ]);
        $financeEmail =  Email::factory()->create([
            "value" => "finance@super.com"
        ]);
        $debuggerEmail =  Email::factory()->create([
            "value" => "debugger@admin.com"
        ]);

        EpiUser::factory()->create([
            "id" => RoleEnum::epi_super->value,
            "registeration_number" => 'epi-2025-1',
            'username' => 'EPI Your username',
            'full_name' => 'Epi Super',
            'password' =>  Hash::make("123123123"),
            'email_id' =>  $epiEmail->id,
            'status' =>  true,
            'zone_id' =>  ZoneEnum::kabul,
            'province_id' =>  ZoneEnum::kabul,
            'gender_id' =>  1,
            'role_id' =>  RoleEnum::epi_super->value,
            'job_id' =>  $job->id,
            'destination_id' =>  1,
        ]);

        FinanceUser::factory()->create([
            "id" => RoleEnum::finance_super->value,
            "registeration_number" => 'finance-2025-1',
            'username' => 'Finance Your username',
            'full_name' => 'Finance Super',
            'password' =>  Hash::make("123123123"),
            'email_id' =>  $financeEmail->id,
            'status' =>  true,
            'zone_id' =>  ZoneEnum::kabul,
            'province_id' =>  ZoneEnum::kabul,
            'gender_id' =>  1,
            'role_id' =>  RoleEnum::finance_super->value,
            'job_id' =>  $job->id,
            'destination_id' =>  1,
        ]);

        User::factory()->create([
            "id" => RoleEnum::debugger->value,
            'full_name' => 'Sayed Naweed Sayedy',
            'username' => 'Sayed Naweed',
            'email_id' =>  $debuggerEmail->id,
            'password' =>  Hash::make("123123123"),
            'status' =>  true,
            'grant_permission' =>  true,
            'role_id' =>  RoleEnum::debugger,
            'job_id' =>  $job->id,
            'destination_id' =>  1,
        ]);
    }
}
