<?php

namespace App\Http\Controllers\api\app\certificate\epi;

use Carbon\Carbon;
use App\Models\Dose;
use App\Models\Visit;
use App\Models\Person;
use App\Models\Address;
use App\Models\Reciept;
use App\Models\Vaccine;
use App\Enums\LanguageEnum;
use App\Models\AddressTran;
use App\Models\VaccineCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Traits\Card\VaccineCardTrait;
use App\Http\Requests\app\certificate\PersonStoreRequest;

class CertificateController extends Controller
{
    //
    use VaccineCardTrait;

    public function certificate(Request $request)
    {

        $request->validate([
            'passport_number' => 'required|string'
        ]);

        $person =  Person::where('passport_number', $request->passport_number)->first();
        if (!$person) {
            return response()->json([
                "message" => __("app_translation.not_found"),
            ], 404);
        }


        $visit = Visit::where('people_id', $person->id)
            ->whereDate('visited_date', Carbon::today())
            ->orderBy('id', 'desc')
            ->first();
        if (!$visit) {
            return response()->json([
                "message" => __("app_translation.today_visit_not_found"),
            ], 404);
        }




        $path = $this->generateCard($visit->id);

        $count = VaccineCard::join('vaccine_payments as vp', 'vp.id', '=', 'vaccine_cards.vaccine_payment_id')
            ->where('vs.visit_id', $visit->id)
            ->select('vaccine_card.download_count')
            ->first();

        $count = $count->download_count + 1;
        $count->save();

        return $path;

        return response()->json([
            "message" => __("app_translation.success"),
        ]);
    }

    public function storePerson(PersonStoreRequest $request)
    {

        $validatedData = $request->validated();


        DB::beginTransaction();

        $address = Address::create([
            'district_id' => $validatedData['district_id'],
            'province_id' => $validatedData['province_id'],
        ]);

        // * Translations
        foreach (LanguageEnum::LANGUAGES as $code => $name) {
            AddressTran::create([
                'address_id' => $address->id,
                'area' => $validatedData["area"],
                'language_name' =>  $code,
            ]);
        }

        // * Create Person
        $person =  Person::create([
            'passport_number' => $validatedData['passport_number'],
            'full_name' => $validatedData['full_name'],
            'father_name' => $validatedData['father_name'],
            'date_of_birth' => $validatedData['date_of_birth'],
            'phone' => $validatedData['phone'],
            'nid_type_id' => 1,
            'gender_id' => $validatedData['gender_id'],
            'nationality_id' => $validatedData['nationality_id'],
            'address_id' => $address->id,
            'epi_user_id' => $request->user()->id,

        ]);

        // visit
        // * Create Visit

        $visit = Visit::create([
            'people_id' => $person->id,
            'visited_date' => Carbon::today()
        ]);

        $vis = str_pad($visit->id, 5, '0', STR_PAD_LEFT);
        $visit->certificate_id  = 'MoPH-' . Carbon::now()->format('Y') . '-' . $vis;

        // * Create Vaccines
        foreach ($validatedData['vaccines'] as $vaccineData) {
            $vaccine = Vaccine::create([
                'registration_number' => '',
                'registration_date' => $vaccineData['registration_date'],
                'volume' => $vaccineData['volume'],
                'page' => $vaccineData['page'],
                'vaccine_center_id' => $vaccineData['vaccine_center_id'],
                'vaccine_type_id' => $vaccineData['vaccine_type_id'],
                'epi_user_id' => $request->user()->id,
                'visit_id' => $visit->id,
            ]);

            $vaccine->registration_number = 'MoPH-' . Carbon::now()->format('Y') . '-' . $vaccine->id;
            $vaccine->save();

            // * Create Doses
            foreach ($vaccineData['doses'] as $doseData) {
                Dose::create([
                    'vaccine_id' => $vaccine->id,
                    'batch_number' => $doseData['batch_number'],
                    'vaccine_date' => $doseData['vaccine_date'],
                    'epi_user_id' => $request->user()->id,
                ]);
            }
        }

        DB::commit();

        return response()->json(
            [
                "message" => __('app_translation.success'),
            ],
            200,
            [],
            JSON_UNESCAPED_UNICODE
        );
    }

    public function recieptStore(Request $request)
    {

        $request->validate([
            'passport_number' => 'required|string',
        ]);


        $payment = Person::join('visits as vs', 'people.id', '=', 'vs.people_id')
            ->join('vaccine_payments as vp', 'vs.id', '=', 'vp.visit_id')
            ->where('people.passport_number', $request->passport_number)
            ->whereDate('vs.visited_date', Carbon::today())
            ->orderBy('vs.id', 'desc')
            ->select('vp.id', 'vs.id as visit_id', 'people.id as person_id')
            ->first();

        if (!$payment) {
            return response()->json([
                "message" => __("app_translation.not_found"),
            ], 404);
        }

        VaccineCard::create([
            'download_count' => 0,
            'issue_date' => Carbon::now(),
            'is_downloaded' => true,
            'vaccine_payment_id' => $payment->id,
            'epi_user_id' => $request->user()->id,
        ]);
    }


    public function activity($user_id)
    {


        // Build query
        $complete = VaccineCard::where('user_id', $user_id)
            ->count();

        $today_count = VaccineCard::where('user_id', $user_id)
            ->whereDate('created_at', Carbon::today())
            ->count();

        $data = [
            "complete_count" => $complete,
            "today_count" => $today_count,
        ];

        return response()->json([
            'data' => $data,
            'message' => __('app_translation.success'),
        ], 200, [], JSON_UNESCAPED_UNICODE);
    }
}
