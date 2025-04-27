<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\District;
use App\Models\Province;
use App\Models\VaccineCenter;
use Illuminate\Database\Seeder;
use App\Models\VaccineCenterTran;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class VaccineCenterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        // Truncate the tables
        DB::table('addresses')->truncate();
        DB::table('vaccine_centers')->truncate();
        DB::table('vaccine_center_trans')->truncate();


        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        $this->vaccineCenterStore();
    }



    public function vaccineCenterStore()
    {
        // Path to the Excel file
        // $filePath = storage_path('app/private/vaccine_centers.xlsx');
        $filePath = storage_path('app/private/vaccine_center_name.xlsx');

        // Check if the file exists
        if (!file_exists($filePath)) {
            $this->command->error("Excel file not found at: $filePath");
            return;
        }

        // Load the Excel file
        $data = Excel::toArray([], $filePath);


        $COUN = 0;
        // Loop through the rows and insert into the database
        foreach ($data[0] as $row) {
            // Skip the header row
            if ($row[0] === 'S/N') {
                continue;
            }

            $COUN = $COUN + 1;
            $district_id = '';
            $province_id = '';
            // First, find the province by name
            $province = Province::join('province_trans', 'provinces.id', '=', 'province_trans.province_id')
                ->where('province_trans.language_name', 'en')
                ->where('province_trans.value', 'like', '%' . $row[1] . '%')
                ->select('provinces.id as province_id')
                ->first();

            if ($province) {
                // Now find the district inside this province
                $district = District::join('district_trans', 'districts.id', '=', 'district_trans.district_id')
                    ->where('districts.province_id', $province->province_id)
                    ->where('district_trans.language_name', 'en')
                    ->where('district_trans.value', 'like', '%' . $row[2] . '%')
                    ->select('districts.id as district_id')
                    ->first();

                if ($district) {
                    // Both found
                    $district_id = $district->district_id;
                    $province_id = $province->province_id;
                    // $result = [
                    //     'province_id' => $province->province_id,
                    //     'district_id' => $district->district_id,
                    // ];
                } else {
                    // Province found but district not found
                    $result = null;
                }
            } else {
                // Province not found
                $result = null;
            }

            // Create Address and Vaccine Center records

            if (!$district_id) {
                $this->command->info("District not found for row $COUN: ");
                return;
            }
            $address = Address::create([

                'district_id' => $district_id, // District column
                'province_id' => $province_id, // Province column
            ]);

            $vaccineCenter = VaccineCenter::create([
                'description' => $row[3], // Type of Health Facility column
                'address_id' => $address->id,
            ]);

            VaccineCenterTran::create([
                'name' => $row[4], // Name of Health Facility column
                'language_name' => 'en',
                'vaccine_center_id' => $vaccineCenter->id,
            ]);
        }

        $this->command->info('Vaccine centers imported successfully!');
    }
}
