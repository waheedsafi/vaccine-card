<?php

namespace Database\Seeders;

use App\Enums\StatusTypeEnum;
use App\Models\PaymentAmount;
use App\Models\PaymentStatus;
use App\Models\PaymentStatusTran;
use App\Models\VaccineType;
use App\Models\VaccineTypeTran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VaccineTypeAndAmountSeeder extends Seeder
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


        $payment =  PaymentStatus::create([
            'id' => StatusTypeEnum::paid->value
        ]);
        PaymentStatusTran::create([
            'payment_status_id' => $payment->id,
            'language_name' => 'fa',
            'name' => 'پرداخت شده',
        ]);
        PaymentStatusTran::create([
            'payment_status_id' => $payment->id,
            'language_name' => 'ps',
            'name' => 'تادیه شوی',
        ]);
        PaymentStatusTran::create([
            'payment_status_id' => $payment->id,
            'language_name' => 'en',
            'name' => 'Paid',
        ]);

        PaymentAmount::create([
            'amount' => 500,
            'payment_status_id' => StatusTypeEnum::paid->value
        ]);
    }
}
