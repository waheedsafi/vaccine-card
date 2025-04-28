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
        $rolePer = RolePermission::factory()->create([
            "role" => RoleEnum::epi_super,
            "permission" => "users"
        ]);
        $this->epiRolePermissionSubUser($rolePer->id);
        $rolePer = RolePermission::factory()->create([
            "role" => RoleEnum::epi_super,
            "permission" => "configurations"
        ]);
        RolePermissionSub::factory()->create([
            "role_permission_id" => $rolePer->id,
            "sub_permission_id" => SubPermissionEnum::configuration_job
        ]);
        RolePermissionSub::factory()->create([
            "role_permission_id" => $rolePer->id,
            "sub_permission_id" => SubPermissionEnum::configuration_destination
        ]);
        RolePermissionSub::factory()->create([
            "role_permission_id" => $rolePer->id,
            "sub_permission_id" => SubPermissionEnum::configuration_vaccine_type
        ]);
        RolePermissionSub::factory()->create([
            "role_permission_id" => $rolePer->id,
            "sub_permission_id" => SubPermissionEnum::configuration_vaccine_center
        ]);
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
        $rolePer = RolePermission::factory()->create([
            "role" => RoleEnum::epi_admin,
            "permission" => "users"
        ]);
        $this->epiRolePermissionSubUser($rolePer->id);
        $rolePer = RolePermission::factory()->create([
            "role" => RoleEnum::epi_admin,
            "permission" => "configurations"
        ]);
        RolePermissionSub::factory()->create([
            "role_permission_id" => $rolePer->id,
            "sub_permission_id" => SubPermissionEnum::configuration_job
        ]);
        RolePermissionSub::factory()->create([
            "role_permission_id" => $rolePer->id,
            "sub_permission_id" => SubPermissionEnum::configuration_destination
        ]);
        RolePermissionSub::factory()->create([
            "role_permission_id" => $rolePer->id,
            "sub_permission_id" => SubPermissionEnum::configuration_vaccine_type
        ]);
        RolePermissionSub::factory()->create([
            "role_permission_id" => $rolePer->id,
            "sub_permission_id" => SubPermissionEnum::configuration_vaccine_center
        ]);
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
        $rolePer = RolePermission::factory()->create([
            "role" => RoleEnum::epi_user,
            "permission" => "vaccine_certificate"
        ]);
        $this->epiRolePermissionSubVaccineCertificate($rolePer->id);
    }
    public function financeSuperPermissions()
    {
        $rolePer = RolePermission::factory()->create([
            "role" => RoleEnum::finance_super,
            "permission" => "users"
        ]);
        $this->financeRolePermissionSubUser($rolePer->id);
        $rolePer = RolePermission::factory()->create([
            "role" => RoleEnum::finance_super,
            "permission" => "configurations"
        ]);
        RolePermissionSub::factory()->create([
            "role_permission_id" => $rolePer->id,
            "sub_permission_id" => SubPermissionEnum::configuration_job
        ]);
        RolePermissionSub::factory()->create([
            "role_permission_id" => $rolePer->id,
            "sub_permission_id" => SubPermissionEnum::configuration_destination
        ]);
        RolePermissionSub::factory()->create([
            "role_permission_id" => $rolePer->id,
            "sub_permission_id" => SubPermissionEnum::configuration_payment
        ]);
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
        $rolePer = RolePermission::factory()->create([
            "role" => RoleEnum::finance_admin,
            "permission" => "users"
        ]);
        $this->financeRolePermissionSubUser($rolePer->id);
        $rolePer = RolePermission::factory()->create([
            "role" => RoleEnum::finance_admin,
            "permission" => "configurations"
        ]);
        RolePermissionSub::factory()->create([
            "role_permission_id" => $rolePer->id,
            "sub_permission_id" => SubPermissionEnum::configuration_job
        ]);
        RolePermissionSub::factory()->create([
            "role_permission_id" => $rolePer->id,
            "sub_permission_id" => SubPermissionEnum::configuration_destination
        ]);
        RolePermissionSub::factory()->create([
            "role_permission_id" => $rolePer->id,
            "sub_permission_id" => SubPermissionEnum::configuration_payment
        ]);
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
    }

    public function debuggerPermissions()
    {
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
            "permission" => "configurations"
        ]);
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
