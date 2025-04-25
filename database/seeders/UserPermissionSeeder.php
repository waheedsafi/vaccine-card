<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use App\Models\UserPermission;
use Illuminate\Database\Seeder;
use App\Enums\SubPermissionEnum;
use App\Models\EpiPermission;
use App\Models\EpiPermissionSub;
use App\Models\FinancePermission;
use App\Models\FinancePermissionSub;
use App\Models\UserPermissionSub;

class UserPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->epiSuperPermissions();
        $this->financeSuperPermissions();
        $this->debuggerPermissions();
    }

    public function epiSuperPermissions()
    {
        $userPermission = EpiPermission::factory()->create([
            "view" => true,
            "edit" => true,
            "delete" => true,
            "add" => true,
            "epi_user_id" => RoleEnum::epi_super->value,
            "permission" => "users"
        ]);
        $this->addEpiSuperSubUserPermissions($userPermission);
        $userPermission = EpiPermission::factory()->create([
            "view" => true,
            "edit" => true,
            "delete" => true,
            "add" => true,
            "epi_user_id" => RoleEnum::epi_super->value,
            "permission" => "configurations"
        ]);
        $this->addEpiConfigurationubPermissions($userPermission);
        EpiPermission::factory()->create([
            "view" => true,
            "edit" => true,
            "delete" => true,
            "add" => true,
            "epi_user_id" => RoleEnum::epi_super->value,
            "permission" => "reports"
        ]);

        $userPermission = EpiPermission::factory()->create([
            "view" => true,
            "edit" => true,
            "delete" => true,
            "add" => true,
            "epi_user_id" => RoleEnum::epi_super->value,
            "permission" => "activity"
        ]);
        $this->addEpiActivitySubPermissions($userPermission);
    }
    public function financeSuperPermissions()
    {
        $userPermission = FinancePermission::factory()->create([
            "view" => true,
            "edit" => true,
            "delete" => true,
            "add" => true,
            "finance_user_id" => RoleEnum::finance_super->value,
            "permission" => "users"
        ]);
        $this->addFinanceSuperSubUserPermissions($userPermission);
        $userPermission = FinancePermission::factory()->create([
            "view" => true,
            "edit" => true,
            "delete" => true,
            "add" => true,
            "finance_user_id" => RoleEnum::finance_super->value,
            "permission" => "configurations"
        ]);
        $this->addFinanceConfigurationsSubPermissions($userPermission);
        FinancePermission::factory()->create([
            "view" => true,
            "edit" => true,
            "delete" => true,
            "add" => true,
            "finance_user_id" => RoleEnum::finance_super->value,
            "permission" => "reports"
        ]);

        $userPermission = FinancePermission::factory()->create([
            "view" => true,
            "edit" => true,
            "delete" => true,
            "add" => true,
            "finance_user_id" => RoleEnum::finance_super->value,
            "permission" => "activity"
        ]);
        $this->addFinanceActivitySubPermissions($userPermission);
    }
    public function debuggerPermissions()
    {
        UserPermission::factory()->create([
            "view" => true,
            "edit" => true,
            "delete" => true,
            "add" => true,
            "user_id" => RoleEnum::debugger->value,
            "permission" => "logs"
        ]);
        UserPermission::factory()->create([
            "view" => true,
            "edit" => true,
            "delete" => true,
            "add" => true,
            "user_id" => RoleEnum::debugger->value,
            "permission" => "audit"
        ]);
    }
    public function addEpiSuperSubUserPermissions($userPermission)
    {
        EpiPermissionSub::factory()->create([
            "edit" => true,
            "delete" => true,
            "add" => true,
            "view" => true,
            "epi_permission_id" => $userPermission->id,
            "sub_permission_id" => SubPermissionEnum::user_information,
        ]);
        EpiPermissionSub::factory()->create([
            "edit" => true,
            "delete" => true,
            "add" => true,
            "view" => true,
            "epi_permission_id" => $userPermission,
            "sub_permission_id" => SubPermissionEnum::user_password,
        ]);
        EpiPermissionSub::factory()->create([
            "edit" => true,
            "delete" => true,
            "add" => true,
            "view" => true,
            "epi_permission_id" => $userPermission,
            "sub_permission_id" => SubPermissionEnum::user_permission,
        ]);
        EpiPermissionSub::factory()->create([
            "edit" => true,
            "delete" => true,
            "add" => true,
            "view" => true,
            "epi_permission_id" => $userPermission->id,
            "sub_permission_id" => SubPermissionEnum::user_profile_activity,
        ]);
        EpiPermissionSub::factory()->create([
            "edit" => true,
            "delete" => true,
            "add" => true,
            "view" => true,
            "epi_permission_id" => $userPermission->id,
            "sub_permission_id" => SubPermissionEnum::user_issued_certificate,
        ]);
    }
    public function addFinanceSuperSubUserPermissions($userPermission)
    {
        FinancePermissionSub::factory()->create([
            "edit" => true,
            "delete" => true,
            "add" => true,
            "view" => true,
            "finance_permission_id" => $userPermission->id,
            "sub_permission_id" => SubPermissionEnum::user_information,
        ]);
        FinancePermissionSub::factory()->create([
            "edit" => true,
            "delete" => true,
            "add" => true,
            "view" => true,
            "finance_permission_id" => $userPermission->id,
            "sub_permission_id" => SubPermissionEnum::user_password,
        ]);
        FinancePermissionSub::factory()->create([
            "edit" => true,
            "delete" => true,
            "add" => true,
            "view" => true,
            "finance_permission_id" => $userPermission->id,
            "sub_permission_id" => SubPermissionEnum::user_permission,
        ]);
        FinancePermissionSub::factory()->create([
            "edit" => true,
            "delete" => true,
            "add" => true,
            "view" => true,
            "finance_permission_id" => $userPermission->id,
            "sub_permission_id" => SubPermissionEnum::user_profile_activity,
        ]);
        FinancePermissionSub::factory()->create([
            "edit" => true,
            "delete" => true,
            "add" => true,
            "view" => true,
            "finance_permission_id" => $userPermission->id,
            "sub_permission_id" => SubPermissionEnum::user_issued_certificate_payment,
        ]);
    }

    public function addEpiConfigurationubPermissions($userPermission)
    {
        foreach (SubPermissionEnum::CONFIGURATIONS as $id => $role) {
            EpiPermissionSub::factory()->create([
                "edit" => true,
                "delete" => true,
                "add" => true,
                "view" => true,
                "epi_permission_id" => $userPermission->id,
                "sub_permission_id" => $id,
            ]);
        }
    }
    public function addFinanceConfigurationsSubPermissions($userPermission)
    {
        foreach (SubPermissionEnum::CONFIGURATIONS as $id => $role) {
            FinancePermissionSub::factory()->create([
                "edit" => true,
                "delete" => true,
                "add" => true,
                "view" => true,
                "finance_permission_id" => $userPermission->id,
                "sub_permission_id" => $id,
            ]);
        }
    }

    public function addEpiActivitySubPermissions($userPermission)
    {
        foreach (SubPermissionEnum::ACTIVITY as $id => $role) {
            EpiPermissionSub::factory()->create([
                "edit" => true,
                "delete" => true,
                "add" => true,
                "view" => true,
                "epi_permission_id" => $userPermission->id,
                "sub_permission_id" => $id,
            ]);
        }
    }
    public function addFinanceActivitySubPermissions($userPermission)
    {
        foreach (SubPermissionEnum::ACTIVITY as $id => $role) {
            FinancePermissionSub::factory()->create([
                "edit" => true,
                "delete" => true,
                "add" => true,
                "view" => true,
                "finance_permission_id" => $userPermission->id,
                "sub_permission_id" => $id,
            ]);
        }
    }
    public function addActivitySubPermissions($userPermission)
    {
        foreach (SubPermissionEnum::ACTIVITY as $id => $role) {
            UserPermissionSub::factory()->create([
                "edit" => true,
                "delete" => true,
                "add" => true,
                "view" => true,
                "user_permission_id" => $userPermission->id,
                "sub_permission_id" => $id,
            ]);
        }
    }
}
