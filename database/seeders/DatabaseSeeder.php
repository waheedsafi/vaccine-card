<?php

namespace Database\Seeders;

use App\Models\Zone;
use App\Models\Gender;
use App\Enums\ZoneEnum;
use App\Models\NidType;
use App\Models\Currency;
use App\Models\Language;
use App\Models\ZoneTrans;
use App\Models\StatusType;
use App\Models\TravelType;
use App\Models\NidTypeTrans;
use App\Enums\StatusTypeEnum;
use App\Models\CurrencyTran;
use App\Models\CurrencyTrans;
use App\Models\TravelTypeTran;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Database\Seeders\CheckListSeeder;

/*
1. If you add new Role steps are:
    1. Add to following:
        - RoleEnum
        - RoleSeeder
        - RolePermissionSeeder (Define which permissions role can access)
        - Optional: Set Role on User go to JobAndUserSeeder Then UserPermissionSeeder


2. If you add new Permission steps are:
    1. Add to following:
        - PermissionEnum
        - SubPermissionEnum (In case has Sub Permissions)
        - PermissionSeeder
        - SubPermissionSeeder Then SubPermissionEnum (I has any sub permissions) 
        - RolePermissionSeeder (Define Which Role can access the permission)
        - Optional: Set Permission on User go to JobAndUserSeeder Then UserPermissionSeeder

        
3. If you add new Sub Permission steps are:
    1. Add to following:
        - SubPermissionEnum
        - SubPermissionSeeder
        - RolePermissionSeeder (Define Which Role can access the permission)
        - Optional: Set Permission on User go to JobAndUserSeeder Then UserPermissionSeeder
*/

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->languages();
        $this->gender();
        $this->call(CountrySeeder::class);
        $this->call(VaccineCenterSeeder::class);
        $this->call(DestinationSeederSecond::class);
        $this->zones();
        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(SubPermissionSeeder::class);
        $this->call(RolePermissionSeeder::class);
        $this->call(JobAndUserSeeder::class);
        $this->call(CheckListSeeder::class);
        $this->call(UserPermissionSeeder::class);
        $this->call(VaccineTypeAndAmountSeeder::class);

        $this->statusType();
        $this->nidTypes();
        $this->travelTypes();
    }
    public function travelTypes()
    {
        $travel = TravelType::create([]);
        TravelTypeTran::create([
            "value" => "حج فرضی",
            "language_name" => "fa",
            "travel_type_id" => $travel->id
        ]);
        TravelTypeTran::create([
            "value" => "حج فرضی",
            "language_name" => "ps",
            "travel_type_id" => $travel->id
        ]);
        TravelTypeTran::create([
            "value" => "Hajj Farzi",
            "language_name" => "en",
            "travel_type_id" => $travel->id
        ]);

        $travel = TravelType::create([]);
        TravelTypeTran::create([
            "value" => "حج عمره",
            "language_name" => "fa",
            "travel_type_id" => $travel->id
        ]);
        TravelTypeTran::create([
            "value" => "حج عمره",
            "language_name" => "ps",
            "travel_type_id" => $travel->id
        ]);
        TravelTypeTran::create([
            "value" => "Hajj Umrah",
            "language_name" => "en",
            "travel_type_id" => $travel->id
        ]);

        $travel = TravelType::create([]);
        TravelTypeTran::create([
            "value" => "عادی",
            "language_name" => "fa",
            "travel_type_id" => $travel->id
        ]);
        TravelTypeTran::create([
            "value" => "عادی",
            "language_name" => "ps",
            "travel_type_id" => $travel->id
        ]);
        TravelTypeTran::create([
            "value" => "Normal",
            "language_name" => "en",
            "travel_type_id" => $travel->id
        ]);
    }

    public function zones()
    {
        $zone = Zone::create([
            'id' => ZoneEnum::kabul
        ]);
        ZoneTrans::create([
            "value" => "کابل",
            "language_name" => "fa",
            "zone_id" => $zone->id
        ]);
        ZoneTrans::create([
            "value" => "کابل",
            "language_name" => "ps",
            "zone_id" => $zone->id
        ]);
        ZoneTrans::create([
            "value" => "Kabul",
            "language_name" => "en",
            "zone_id" => $zone->id
        ]);
        $zone = Zone::create([]);
        ZoneTrans::create([
            "value" => "قندهار",
            "language_name" => "fa",
            "zone_id" => $zone->id
        ]);
        ZoneTrans::create([
            "value" => "کندهار",
            "language_name" => "ps",
            "zone_id" => $zone->id
        ]);
        ZoneTrans::create([
            "value" => "Kandahar",
            "language_name" => "en",
            "zone_id" => $zone->id
        ]);
        $zone = Zone::create([]);
        ZoneTrans::create([
            "value" => "مزار شریف",
            "language_name" => "fa",
            "zone_id" => $zone->id
        ]);
        ZoneTrans::create([
            "value" => "مزار شریف",
            "language_name" => "ps",
            "zone_id" => $zone->id
        ]);
        ZoneTrans::create([
            "value" => "Mazar-E-Sharif",
            "language_name" => "en",
            "zone_id" => $zone->id
        ]);

        $zone = Zone::create([]);
        ZoneTrans::create([
            "value" => "هرات",
            "language_name" => "fa",
            "zone_id" => $zone->id
        ]);
        ZoneTrans::create([
            "value" => "هرات",
            "language_name" => "ps",
            "zone_id" => $zone->id
        ]);
        ZoneTrans::create([
            "value" => "Herat",
            "language_name" => "en",
            "zone_id" => $zone->id
        ]);
    }
    public function nidTypes()
    {
        $nid = NidType::create([]);
        NidTypeTrans::create([
            "value" => "پاسپورت",
            "language_name" => "fa",
            "nid_type_id" => $nid->id
        ]);
        NidTypeTrans::create([
            "value" => "پاسپورټ",
            "language_name" => "ps",
            "nid_type_id" => $nid->id
        ]);
        NidTypeTrans::create([
            "value" => "Passport",
            "language_name" => "en",
            "nid_type_id" => $nid->id
        ]);
        $nid = NidType::create([]);
        NidTypeTrans::create([
            "value" => "تذکره",
            "language_name" => "fa",
            "nid_type_id" => $nid->id
        ]);
        NidTypeTrans::create([
            "value" => "تذکره",
            "language_name" => "ps",
            "nid_type_id" => $nid->id
        ]);
        NidTypeTrans::create([
            "value" => "ID card",
            "language_name" => "en",
            "nid_type_id" => $nid->id
        ]);
    }
    public function statusType() {}

    protected function gender()
    {

        Gender::create([
            'name_en' => 'Male',
            'name_fa' => 'مرد',
            'name_ps' => 'نارینه'
        ]);

        Gender::create([
            'name_en' => 'Famale',
            'name_fa' => 'زن',
            'name_ps' => 'ښځینه'
        ]);
    }
    public function languages(): void
    {
        Language::factory()->create([
            "name" => "en"
        ]);
        Language::factory()->create([
            "name" => "ps"
        ]);
        Language::factory()->create([
            "name" => "fa"
        ]);
    }
}
