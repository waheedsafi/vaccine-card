<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use App\Models\RolePermission;
use Illuminate\Database\Seeder;
use App\Enums\SubPermissionEnum;
use App\Models\RolePermissionSub;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->epiSuperPermissions();
        $this->epiAdminPermissions();
        $this->epiUserPermissions();
        $this->financeSuperPermissions();
        $this->financeAdminPermissions();
        $this->financeUserPermissions();
        $this->debuggerPermissions();
    }

    public function epiSuperPermissions()
    {
        RolePermission::factory()->create([
            "role" => RoleEnum::epi_super,
            "permission" => "dashboard"
        ]);
        $rolePer = RolePermission::factory()->create([
            "role" => RoleEnum::epi_super,
            "permission" => "users"
        ]);
        $this->epiRolePermissionSubUser($rolePer->id);
        $rolePer = RolePermission::factory()->create([
            "role" => RoleEnum::epi_super,
            "permission" => "settings"
        ]);
        $this->rolePermissionSubSetting($rolePer->id);
        RolePermission::factory()->create([
            "role" => RoleEnum::epi_super,
            "permission" => "reports"
        ]);
        $rolePer = RolePermission::factory()->create([
            "role" => RoleEnum::epi_super,
            "permission" => "activity"
        ]);
        $this->rolePermissionSubActivity($rolePer->id);
    }
    public function epiAdminPermissions()
    {
        RolePermission::factory()->create([
            "role" => RoleEnum::epi_admin,
            "permission" => "dashboard"
        ]);
        $rolePer = RolePermission::factory()->create([
            "role" => RoleEnum::epi_admin,
            "permission" => "users"
        ]);
        $this->epiRolePermissionSubUser($rolePer->id);
        $rolePer = RolePermission::factory()->create([
            "role" => RoleEnum::epi_admin,
            "permission" => "settings"
        ]);
        $this->rolePermissionSubSetting($rolePer->id);
        RolePermission::factory()->create([
            "role" => RoleEnum::epi_admin,
            "permission" => "reports"
        ]);
        $rolePer = RolePermission::factory()->create([
            "role" => RoleEnum::epi_admin,
            "permission" => "activity"
        ]);
        $this->rolePermissionSubActivity($rolePer->id);
    }
    public function epiUserPermissions()
    {
        RolePermission::factory()->create([
            "role" => RoleEnum::epi_user,
            "permission" => "dashboard"
        ]);
        $rolePer = RolePermission::factory()->create([
            "role" => RoleEnum::epi_user,
            "permission" => "vaccine_certificate"
        ]);
        $this->epiRolePermissionSubVaccineCertificate($rolePer->id);
        $rolePer = RolePermission::factory()->create([
            "role" => RoleEnum::epi_user,
            "permission" => "settings"
        ]);
        RolePermissionSub::factory()->create([
            "role_permission_id" => $rolePer->id,
            "sub_permission_id" => SubPermissionEnum::setting_language
        ]);
    }
    public function financeSuperPermissions()
    {
        RolePermission::factory()->create([
            "role" => RoleEnum::finance_super,
            "permission" => "dashboard"
        ]);
        $rolePer = RolePermission::factory()->create([
            "role" => RoleEnum::finance_super,
            "permission" => "users"
        ]);
        $this->financeRolePermissionSubUser($rolePer->id);
        $rolePer = RolePermission::factory()->create([
            "role" => RoleEnum::finance_super,
            "permission" => "settings"
        ]);
        $this->rolePermissionSubSetting($rolePer->id);
        RolePermission::factory()->create([
            "role" => RoleEnum::finance_super,
            "permission" => "reports"
        ]);
        $rolePer = RolePermission::factory()->create([
            "role" => RoleEnum::finance_super,
            "permission" => "activity"
        ]);
        $this->rolePermissionSubActivity($rolePer->id);
    }
    public function financeAdminPermissions()
    {
        RolePermission::factory()->create([
            "role" => RoleEnum::finance_admin,
            "permission" => "dashboard"
        ]);
        $rolePer = RolePermission::factory()->create([
            "role" => RoleEnum::finance_admin,
            "permission" => "users"
        ]);
        $this->financeRolePermissionSubUser($rolePer->id);
        $rolePer = RolePermission::factory()->create([
            "role" => RoleEnum::finance_admin,
            "permission" => "settings"
        ]);
        $this->rolePermissionSubSetting($rolePer->id);
        RolePermission::factory()->create([
            "role" => RoleEnum::finance_admin,
            "permission" => "reports"
        ]);
        $rolePer = RolePermission::factory()->create([
            "role" => RoleEnum::finance_admin,
            "permission" => "activity"
        ]);
        $this->rolePermissionSubActivity($rolePer->id);
    }
    public function financeUserPermissions()
    {
        $rolePer = RolePermission::factory()->create([
            "role" => RoleEnum::finance_user,
            "permission" => "certificate_payment"
        ]);
        $this->financeUserRolePermissionSubCertificatePayment($rolePer->id);
        $rolePer = RolePermission::factory()->create([
            "role" => RoleEnum::finance_user,
            "permission" => "settings"
        ]);
        RolePermissionSub::factory()->create([
            "role_permission_id" => $rolePer->id,
            "sub_permission_id" => SubPermissionEnum::setting_language
        ]);
    }

    public function debuggerPermissions()
    {
        RolePermission::factory()->create([
            "role" => RoleEnum::debugger,
            "permission" => "dashboard"
        ]);
        RolePermission::factory()->create([
            "role" => RoleEnum::debugger,
            "permission" => "logs"
        ]);
        RolePermission::factory()->create([
            "role" => RoleEnum::debugger,
            "permission" => "audit"
        ]);
        $rolePer = RolePermission::factory()->create([
            "role" => RoleEnum::debugger,
            "permission" => "settings"
        ]);

        $this->rolePermissionSubSetting($rolePer->id);
    }

    public function epiRolePermissionSubUser($role_permission_id)
    {
        RolePermissionSub::factory()->create([
            "role_permission_id" => $role_permission_id,
            "sub_permission_id" => SubPermissionEnum::user_information
        ]);
        RolePermissionSub::factory()->create([
            "role_permission_id" => $role_permission_id,
            "sub_permission_id" => SubPermissionEnum::user_password
        ]);
        RolePermissionSub::factory()->create([
            "role_permission_id" => $role_permission_id,
            "sub_permission_id" => SubPermissionEnum::user_permission
        ]);
        RolePermissionSub::factory()->create([
            "role_permission_id" => $role_permission_id,
            "sub_permission_id" => SubPermissionEnum::user_profile_activity
        ]);
        RolePermissionSub::factory()->create([
            "role_permission_id" => $role_permission_id,
            "sub_permission_id" => SubPermissionEnum::user_issued_certificate
        ]);
    }

    public function epiRolePermissionSubVaccineCertificate($role_permission_id)
    {
        RolePermissionSub::factory()->create([
            "role_permission_id" => $role_permission_id,
            "sub_permission_id" => SubPermissionEnum::vaccine_certificate_person_info
        ]);
        RolePermissionSub::factory()->create([
            "role_permission_id" => $role_permission_id,
            "sub_permission_id" => SubPermissionEnum::vaccine_certificate_vaccination_info
        ]);
        RolePermissionSub::factory()->create([
            "role_permission_id" => $role_permission_id,
            "sub_permission_id" => SubPermissionEnum::vaccine_certificate_card_issuing
        ]);
    }

    public function financeRolePermissionSubUser($role_permission_id)
    {
        RolePermissionSub::factory()->create([
            "role_permission_id" => $role_permission_id,
            "sub_permission_id" => SubPermissionEnum::user_information
        ]);
        RolePermissionSub::factory()->create([
            "role_permission_id" => $role_permission_id,
            "sub_permission_id" => SubPermissionEnum::user_password
        ]);
        RolePermissionSub::factory()->create([
            "role_permission_id" => $role_permission_id,
            "sub_permission_id" => SubPermissionEnum::user_permission
        ]);
        RolePermissionSub::factory()->create([
            "role_permission_id" => $role_permission_id,
            "sub_permission_id" => SubPermissionEnum::user_profile_activity
        ]);
        RolePermissionSub::factory()->create([
            "role_permission_id" => $role_permission_id,
            "sub_permission_id" => SubPermissionEnum::user_issued_certificate_payment
        ]);
    }
    public function rolePermissionSubSetting($role_permission_id)
    {
        foreach (SubPermissionEnum::SETTINGS as $id => $role) {
            RolePermissionSub::factory()->create([
                "role_permission_id" => $role_permission_id,
                "sub_permission_id" => $id
            ]);
        }
    }

    public function rolePermissionSubActivity($role_permission_id)
    {
        foreach (SubPermissionEnum::ACTIVITY as $id => $role) {
            RolePermissionSub::factory()->create([
                "role_permission_id" => $role_permission_id,
                "sub_permission_id" => $id
            ]);
        }
    }
    public function financeUserRolePermissionSubCertificatePayment($role_permission_id)
    {
        foreach (SubPermissionEnum::CERTIFICATE_PAYMENT as $id => $role) {
            RolePermissionSub::factory()->create([
                "role_permission_id" => $role_permission_id,
                "sub_permission_id" => $id
            ]);
        }
    }
}
