<?php

namespace Database\Seeders;

use App\Enums\CurrencyEnum;
use App\Enums\LanguageEnum;
use App\Enums\RoleEnum;
use App\Models\Currency;
use App\Models\VaccineType;
use App\Models\CurrencyTran;
use App\Enums\StatusTypeEnum;
use App\Models\PaymentAmount;
use App\Models\PaymentStatus;
use App\Models\VaccineTypeTran;
use Illuminate\Database\Seeder;
use App\Models\PaymentStatusTran;
use App\Models\SystemPayment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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

        $this->payment();
    }
    public function payment()
    {
        $curreny =  Currency::factory()->create([
            'abbr' => 'AFG',
            'symbole' => '&#1547;',
        ]);
        CurrencyTran::factory()->create([
            'currency_id' => $curreny->id,
            'language_name' => 'en',
            'name' => 'Afghani'
        ]);
        CurrencyTran::factory()->create([
            'currency_id' => $curreny->id,
            'language_name' => 'fa',
            'name' => 'افغانی'
        ]);
        CurrencyTran::factory()->create([
            'currency_id' => $curreny->id,
            'language_name' => 'ps',
            'name' => 'افغانی'
        ]);

        $paymentStatus = PaymentStatus::create([
            'id' => StatusTypeEnum::payment->value
        ]);
        PaymentStatusTran::create([
            'name' => 'Payment',
            'payment_status_id' => $paymentStatus->id,
            'language_name' => 'en',
        ]);
        PaymentStatusTran::create([
            'name' => 'پرداخت',
            'payment_status_id' => $paymentStatus->id,
            'language_name' => 'fa',
        ]);
        PaymentStatusTran::create([
            'name' => 'پرداخت',
            'payment_status_id' => $paymentStatus->id,
            'language_name' => 'ps',
        ]);
        $paymentStatus = PaymentStatus::create([
            'id' => StatusTypeEnum::no_payment->value
        ]);

        PaymentStatusTran::create([
            'name' => 'No payment',
            'payment_status_id' => $paymentStatus->id,
            'language_name' => 'en',
        ]);
        PaymentStatusTran::create([
            'name' => 'بدون پرداخت',
            'payment_status_id' => $paymentStatus->id,
            'language_name' => 'fa',
        ]);
        PaymentStatusTran::create([
            'name' => 'هیڅ تادیه نشته',
            'payment_status_id' => $paymentStatus->id,
            'language_name' => 'ps',
        ]);
        $paymentStatus = PaymentStatus::create([
            'id' => StatusTypeEnum::paid->value
        ]);

        PaymentStatusTran::create([
            'name' => 'Paid',
            'payment_status_id' => $paymentStatus->id,
            'language_name' => 'en',
        ]);
        PaymentStatusTran::create([
            'name' => 'پرداخت شده',
            'payment_status_id' => $paymentStatus->id,
            'language_name' => 'fa',
        ]);
        PaymentStatusTran::create([
            'name' => 'ورکړل شوی',
            'payment_status_id' => $paymentStatus->id,
            'language_name' => 'ps',
        ]);

        $paymentStatus = PaymentStatus::create([
            'id' => StatusTypeEnum::unpaid->value
        ]);

        PaymentStatusTran::create([
            'name' => 'Unpaid',
            'payment_status_id' => $paymentStatus->id,
            'language_name' => 'en',
        ]);
        PaymentStatusTran::create([
            'name' => 'پرداخت نشده',
            'payment_status_id' => $paymentStatus->id,
            'language_name' => 'fa',
        ]);
        PaymentStatusTran::create([
            'name' => 'پرداخت نشده',
            'payment_status_id' => $paymentStatus->id,
            'language_name' => 'ps',
        ]);

        SystemPayment::create([
            'finance_user_id' => RoleEnum::finance_super,
            'active' => true,
            'currancy_id' => CurrencyEnum::afghani->value,
            'amount' => 500,
            'payment_status_id' => StatusTypeEnum::payment,
        ]);
    }
}
