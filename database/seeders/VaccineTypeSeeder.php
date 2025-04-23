<?php

namespace Database\Seeders;

use App\Models\VaccineType;
use App\Models\VaccineTypeTran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VaccineTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $vaccines = [
            [
                'description' => 'Covid-19 vaccine',
                'number_of_doses' => 2,
                'translations' => [
                    'en' => 'Covid-19 vaccine',
                    'fa' => 'واکسین کوید 19',
                    'ps' => 'د کوید 19 واکسین',
                ],
            ],
            [
                'description' => 'Meningitis Vaccine',
                'number_of_doses' => 2,
                'translations' => [
                    'en' => 'Meningitis Vaccine',
                    'fa' => 'واکسین مننجایتس',
                    'ps' => 'د مننجیت واکسین',
                ],
            ],
            [
                'description' => 'Seasonal flu vaccine ',
                'number_of_doses' => 2,
                'translations' => [
                    'en' => 'Seasonal flu vaccine ',
                    'fa' => 'واکسین آنفلوآنزا موسمی',
                    'ps' => 'د موسمی آنفلوآنزا واکسین',
                ],
            ],
            [
                'description' => 'OPV Vaccine ',
                'number_of_doses' => 2,
                'translations' => [
                    'en' => 'OPV Vaccine',
                    'fa' => 'واکسین پولیو',
                    'ps' => 'د پولیو واکسین',
                ],
            ],

        ];

        foreach ($vaccines as $vaccineData) {
            $vaccine = VaccineType::create([
                'description' => $vaccineData['description'],
                'number_of_doses' => $vaccineData['number_of_doses'],
            ]);

            foreach ($vaccineData['translations'] as $lang => $name) {
                VaccineTypeTran::create([
                    'vaccine_type_id' => $vaccine->id,
                    'language_name' => $lang,
                    'name' => $name,
                ]);
            }
        }
    }
}
