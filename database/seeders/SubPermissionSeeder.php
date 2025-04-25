<?php

namespace Database\Seeders;

use App\Enums\PermissionEnum;
use App\Models\SubPermission;
use Illuminate\Database\Seeder;
use App\Enums\SubPermissionEnum;

class SubPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->subUserPermissions();
        $this->subVeccineCertificatePermissions();
        $this->subCertificatePaymentPermissions();
        $this->subConfigurationsPermissions();
        $this->subActivityPermissions();
    }
    public function subUserPermissions()
    {
        foreach (SubPermissionEnum::USERS as $id => $role) {
            SubPermission::factory()->create([
                "id" => $id,
                "permission" => PermissionEnum::users->value,
                "name" => $role,
            ]);
        }
    }
    public function subVeccineCertificatePermissions()
    {
        foreach (SubPermissionEnum::VACCINE_CERTIFICATE as $id => $role) {
            SubPermission::factory()->create([
                "id" => $id,
                "permission" => PermissionEnum::vaccine_certificate->value,
                "name" => $role,
            ]);
        }
    }
    public function subCertificatePaymentPermissions()
    {
        foreach (SubPermissionEnum::CERTIFICATE_PAYMENT as $id => $role) {
            SubPermission::factory()->create([
                "id" => $id,
                "permission" => PermissionEnum::certificate_payment->value,
                "name" => $role,
            ]);
        }
    }
    public function subConfigurationsPermissions()
    {
        foreach (SubPermissionEnum::CONFIGURATIONS as $id => $role) {
            SubPermission::factory()->create([
                "id" => $id,
                "permission" => PermissionEnum::configurations->value,
                "name" => $role,
            ]);
        }
    }

    public function subActivityPermissions()
    {
        foreach (SubPermissionEnum::ACTIVITY as $id => $role) {
            SubPermission::factory()->create([
                "id" => $id,
                "permission" => PermissionEnum::activity->value,
                "name" => $role,
            ]);
        }
    }
}
