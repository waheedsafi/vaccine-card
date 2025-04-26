<?php

namespace App\Traits\Card;

use App\Models\People;
use Mpdf\Mpdf;
use App\Models\Person;
use App\Models\VaccineCenterTran;
use Mpdf\Config\FontVariables;
use Mpdf\Config\ConfigVariables;


trait VaccineCardTrait
{
    private function generateCard($visit_id)
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
        ]);


        // set watermardk
        // $watermarkImagePath = storage_path('app/public/images/emart.png');
        // $mpdf->SetWatermarkImage($watermarkImagePath, 0.2); // Set watermark and opacity
        // $mpdf->showWatermarkImage = true; // Enable watermark


        $data = $this->data($visit_id);



        // return $data;
        $part = view('epi/card.vaccine_card', ['data' => $data])->render();
        $mpdf->WriteHTML($part);

        $footerHtml = '
    
        ';

        $mpdf->SetHTMLFooter($footerHtml, 'O');
        $mpdf->SetHTMLFooter($footerHtml, 'E');

        $fileName = "vaccine_waheed.pdf";
        $outputPath = storage_path("app/private/temp/");
        if (!is_dir($outputPath)) {
            mkdir($outputPath, 0755, true);
        }
        $filePath = $outputPath . $fileName;


        // return $filePath; F
        $mpdf->Output($filePath, 'I'); // Save to file


    }


    // protected function data($visit_id)
    // {
    //     // Fetch all data related to the visit
    //     $records = Person::join('visits as vs', 'people.id', '=', 'vs.people_id')
    //         ->join('vaccines as vac', 'vs.id', '=', 'vac.visit_id')
    //         ->join('vaccine_type_trans as vtt', function ($join) {
    //             $join->on('vac.vaccine_type_id', '=', 'vtt.vaccine_type_id')
    //                 ->where('vtt.language_name', '=', 'en');
    //         })
    //         ->join('doses as d', 'vac.id', '=', 'd.vaccine_id')
    //         ->where('vs.id', $visit_id)
    //         ->select(
    //             'people.full_name',
    //             'people.father_name',
    //             'people.date_of_birth',
    //             'people.passport_number',
    //             'people.gender_id',
    //             'vs.certificate_id',
    //             'vs.visited_date as issue_date',
    //             'vtt.name as vaccine_type_name',
    //             'vac.id as vaccine_id',
    //             'd.vaccine_date',
    //             'd.batch_number'
    //         )
    //         ->get();

    //     // return 'success';


    //     // Group data by person and structure it
    //     $result = $records->groupBy('passport_number')->map(function ($personRecords) {
    //         $person = $personRecords->first(); // Get the first record for person details

    //         // Group vaccines and their doses
    //         $vaccines = $personRecords->groupBy('vaccine_id')->map(function ($vaccineRecords) {
    //             // $vaccine = $vaccineRecords->first(); // Get the first record for vaccine details

    //             // Map doses for the vaccine
    //             $doses = $vaccineRecords->map(function ($dose) {
    //                 return [
    //                     'vaccine_date' => $dose->vaccine_date,
    //                     'batch_number' => $dose->batch_number,
    //                 ];
    //             });

    //             return [
    //                 'vaccine_type_name' => $vaccine->vaccine_type_name,
    //                 'vaccine_id' => $vaccine->vaccine_id,
    //                 'doses' => $doses,
    //             ];
    //         });

    //         return [
    //             'full_name' => $person->full_name,
    //             'father_name' => $person->father_name,
    //             'date_of_birth' => $person->date_of_birth,
    //             'passport_number' => $person->passport_number,
    //             'issue_date' => $person->issue_date,
    //             'vaccine_center' => 'center',
    //             'gender' => $person->gender_id == 1 ? "Male" : "Female",
    //             'certificate_id' => $person->certificate_id,
    //             'vaccines' => $vaccines->values(),
    //         ];
    //     });


    //     return $result->values();
    // }




    protected function data($visit_id)
    {
        // Fetch all data related to the visit

        // Fetch all data related to the visit
        $records = People::join('visits as vs', 'people.id', '=', 'vs.people_id')

            ->leftJoin('vaccines as vac', 'vs.id', '=', 'vac.visit_id')
            ->leftJoin('vaccine_type_trans as vtt', function ($join) {
                $join->on('vac.vaccine_type_id', '=', 'vtt.vaccine_type_id')
                    ->where('vtt.language_name', '=', 'en');
            })
            ->leftJoin('doses as d', 'vac.id', '=', 'd.vaccine_id')
            ->where('vs.id', $visit_id)
            ->select(
                'vs.id  as visit_id',
                'people.full_name',
                'people.father_name',
                'people.date_of_birth',
                'people.passport_number',
                'people.gender_id',
                'vac.vaccine_center_id',
                'vs.certificate_id',
                'vs.visited_date as issue_date',
                'vtt.name as vaccine_type_name',
                'vac.id as vaccine_id',
                'd.vaccine_date',
                'd.batch_number'
            )
            ->get();




        // ->leftJoin('vaccine_center_trans vct',  function ($join) {
        //     $join->on('vac.vaccine_center_id', '=', 'vct.vaccine_center_id')
        //         ->where('vct.language_name', '=', 'en');
        // })


        // Group data by person and structure it
        $result = $records->groupBy('passport_number')->map(function ($personRecords) {
            $person = $personRecords->first(); // Get the first record for person details

            // Group vaccines and their doses
            $vaccines = $personRecords->groupBy('vaccine_id')->map(function ($vaccineRecords) {
                // Map doses for the vaccine



                $doses = $vaccineRecords->map(function ($dose) {
                    return [

                        'vaccine_date' => $dose->vaccine_date,
                        'batch_number' => $dose->batch_number,
                    ];
                });

                return [
                    'vaccine_type_name' => $vaccineRecords->first()->vaccine_type_name,
                    'vaccine_center' => $this->vaccine_center($vaccineRecords->first()->vaccine_center_id),
                    'vaccine_id' => $vaccineRecords->first()->vaccine_id,
                    'doses' => $doses->values(),
                ];
            });


            return [
                'visit_id' => $person->visit_id,
                'full_name' => $person->full_name,
                'father_name' => $person->father_name,
                'date_of_birth' => $person->date_of_birth,
                'passport_number' => $person->passport_number,
                'issue_date' => $person->issue_date,
                'gender' => $person->gender_id == 1 ? "Male" : "Female",
                'certificate_id' => $person->certificate_id,
                'vaccines' => $vaccines->values(),
            ];
        });

        return $result->values();
    }


    private function vaccine_center($center_id)
    {


        $vaccine_center = VaccineCenterTran::where('vaccine_center_id', $center_id)
            ->where('language_name', 'en')
            ->select('name')->first();
        return $vaccine_center->name;
    }
}
