<?php

namespace App\Traits\Reciept;

use App\Models\People;
use Mpdf\Mpdf;
use App\Models\Person;
use App\Models\VaccineCenterTran;
use App\Models\ZoneTrans;
use Mpdf\Config\FontVariables;
use Mpdf\Config\ConfigVariables;


trait RecieptTrait
{
    private function generateRecipt($visit_id, $user)
    {

        $configVariables = new ConfigVariables();
        $fontDirs = $configVariables->getDefaults()['fontDir'];
        $fontVariables = new FontVariables();
        $fontData = $fontVariables->getDefaults()['fontdata'];


        $mpdf = new Mpdf([
            'fontDir' => array_merge($fontDirs, [public_path('fonts/amiri')]),
            'fontdata' => $fontData + [
                'amiri' => [
                    'R' => 'Amiri-Regular.ttf',
                    'B' => 'Amiri-Bold.ttf',
                    'I' => 'Amiri-Italic.ttf',
                    'BI' => 'Amiri-BoldItalic.ttf'
                ]
            ],
            'default_font' => 'amiri',
            'mode' => 'utf-8',
            'autoScriptToLang' => true,
            'autoLangToFont' => true,
            'margin_bottom' => 50,  // Increase bottom margin to make space for the footer
            'format' => 'A4-L',
        ]);


        // set watermardk
        // $watermarkImagePath = storage_path('app/public/images/emart.png');
        // $mpdf->SetWatermarkImage($watermarkImagePath, 0.2); // Set watermark and opacity
        // $mpdf->showWatermarkImage = true; // Enable watermark


        $data = $this->data($visit_id, $user);



        // return $data;
        $part = view('finance.reciept.receipt', ['data' => $data])->render();
        $mpdf->WriteHTML($part);


        $fileName = "vaccine_waheed.pdf";
        $outputPath = storage_path("app/private/temp/");
        if (!is_dir($outputPath)) {
            mkdir($outputPath, 0755, true);
        }
        $filePath = $outputPath . $fileName;

        // return $filePath; F
        $mpdf->Output($filePath, 'I'); // Save to file


    }






    protected function data($visit_id, $user)
    {
        // Fetch all data related to the visit


        // Fetch all data related to the visit
        $records = People::join('visits as vs', 'people.id', '=', 'vs.people_id')
            ->join('travel_type_trans as ttt', function ($join) {
                $join->on('vs.travel_type_id', '=', 'ttt.travel_type_id')
                    ->where('ttt.language_name', '=', 'fa');
            })
            ->join('vaccine_payments as vp', 'vs.id', '=', 'vp.visit_id')
            ->where('vs.id', $visit_id)
            ->select(
                'people.full_name',
                'people.father_name',
                'people.date_of_birth',
                'people.passport_number',
                'vp.paid_amount',
                'vp.payment_uuid',
                'ttt.value as travel_type_name',
            )
            ->first();


        $zone = ZoneTrans::where('zone_id', $user->zone_id)
            ->where('language_name', 'fa')
            ->select('value as name')->first();



        return [
            'full_name' => $records->full_name,
            'payment_no' => $records->payment_uuid,
            'passport_number' => $records->passport_number,
            'travel_type' => $records->travel_type_name,
            'paid_amount' => $records->paid_amount,
            'user_name' => $user->full_name ?? '',
            'zone' => $zone->name ?? '',
            'registeration_number' => $user->registeration_number ?? '',

        ];
    }


    private function vaccine_center($center_id)
    {


        $vaccine_center = VaccineCenterTran::where('vaccine_center_id', $center_id)
            ->where('language_name', 'en')
            ->select('name')->first();
        return $vaccine_center->name;
    }
}
