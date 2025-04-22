<?php

namespace App\Http\Controllers\api\app\certificate\epi;

use Carbon\Carbon;
use App\Models\Dose;
use App\Models\Audit;
use App\Models\Visit;
use App\Models\People;
use App\Models\Address;
use App\Models\Vaccine;
use App\Enums\LanguageEnum;
use App\Models\AddressTran;
use App\Models\VaccineCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\EpiUserPasswordChange;
use App\Traits\Card\VaccineCardTrait;
use App\Http\Requests\app\certificate\PersonStoreRequest;

class CertificateController extends Controller
{
    use VaccineCardTrait;

    public function searchCertificate(Request $request)
    {
        $request->validate([
            'filters.search.value' => 'required|string',
        ]);
        $tr = [];
        $perPage = $request->input('per_page', 10); // Number of records per page
        $page = $request->input('page', 1); // Current page

        $query = DB::table('people as p')
            ->where('p.passport_number', '!=', $request->passport_number)
            ->join('visits as v', function ($join) {
                $join->on('v.people_id', '=', 'p.id')
                    ->latest('v.id');
            })
            ->select(
                "p.id",
                "p.passport_number",
                "p.full_name",
                "p.father_name",
                "p.created_at",
                "v.id as visit_id",
                "v.visited_date as last_visit_date"
            );
        $tr = $query->paginate($perPage, ['*'], 'page', $page);
        return response()->json(
            [
                "person_certificates" => $tr,
            ],
            200,
            [],
            JSON_UNESCAPED_UNICODE
        );
    }

    public function personalInformation($visit_id)
    {
        $locale = app()->getLocale();

        $visit = DB::table('visits')
            ->join('people', 'visits.people_id', '=', 'people.id')
            ->join('addresses add', 'people.address_id', '=', 'add.id')
            ->join('address_trans', function ($join) use ($locale) {
                $join->on('add.id', '=', 'address_trans.address_id')
                    ->where('address_trans.language_name', '=', $locale);
            })
            ->join('district_trans', function ($join) use ($locale) {
                $join->on('add.district_id', '=', 'district_trans.district_id')
                    ->where('district_trans.language_name', '=', $locale);
            })
            ->join('province_trans', function ($join) use ($locale) {
                $join->on('add.province_id', '=', 'province_trans.province_id')
                    ->where('province_trans.language_name', '=', $locale);
            })
            ->join('travel_type_trans', function ($join) use ($locale) {
                $join->on('visits.travel_type_id', '=', 'travel_type_trans.travel_type_id')
                    ->where('travel_type_trans.language_name', '=', $locale);
            })
            ->join('country_trans', function ($join) use ($locale) {
                $join->on('visits.country_id', '=', 'country_trans.country_id')
                    ->where('country_trans.language_name', '=', $locale);
            })
            ->where('visits.people_id', $visit_id)
            ->whereDate('visits.visited_date', Carbon::today())
            ->orderByDesc('visits.id')
            ->select([
                'people.full_name',
                'people.father_name',
                'people.passport_number',
                'people.date_of_birth',
                'people.phone',
                'people.nid_type_id',
                'visits.visited_date as visit_date',
                'travel_type_trans.value as travel_type',
                'visits.travel_type_id',
                'add.district_id',
                'add.province_id',
                'country_trans.value as country',
                'visits.country_id',
                'district_trans.value as district',
                'province_trans.value as province',
                'address_trans.area as area',
            ])
            ->first();

        $data = [
            'full_name' => $visit->full_name,
            'father_name' => $visit->father_name,
            'passport_number' => $visit->passport_number,
            'date_of_birth' => $visit->date_of_birth,
            'phone' => $visit->phone,
            'nid_type_id' => $visit->nid_type_id,
            'visited_date' => $visit->visit_date,
            'country_id' => ['id' => $visit->country_id, 'name' => $visit->country],
            'travel_type' => ['id' => $visit->travel_type_id, 'name' => $visit->travel_type],
            'district' => ['id' => $visit->district_id, 'name' => $visit->district],
            'province' => ['id' => $visit->province_id, 'name' => $visit->province],
            'area' => $visit->area,
            'province_id' => $visit->province_id,
            'address_id' => $visit->address_id,
        ];

        return response()->json([
            "message" => __("app_translation.success"),
            "data" => $data
        ], 200);
    }

    public function vaccineInformation($visit_id)
    {

        $vaccine =    Vaccine::join('doses as d', 'vaccines.id', '=', 'd.vaccine_id')
            ->join('vaccine_centers as vc', 'vaccines.vaccine_center_id', '=', 'vc.id')
            ->join('vaccine_type_trans as vtt', function ($join) {
                $join->on('vaccines.vaccine_type_id', '=', 'vtt.vaccine_type_id')
                    ->where('vtt.language_name', '=', 'en');
            })
            ->leftJoin('vaccine_center_trans vct',  function ($join) {
                $join->on('vaccines.vaccine_center_id', '=', 'vct.vaccine_center_id')
                    ->where('vct.language_name', '=', 'en');
            })
            ->where('vaccines.visit_id', $visit_id)
            ->select([
                'vaccines.registration_number',
                'vaccines.registration_date',
                'vaccines.volume',
                'vaccines.page',
                'vaccines.id as vaccine_id',
                'vaccines.vaccine_center_id',
                'vct.name as vaccine_center_name',
                'vaccines.vaccine_type_id',
                'vtt.name as vaccine_type_name',
                'd.id as dose_id',
                'd.batch_number',
                'd.vaccine_date',

            ])
            ->get();


        // Group vaccines and their doses
        $vaccines = $vaccine->groupBy('vaccine_id')->map(function ($vaccineRecords) {
            // Map doses for the vaccine



            $doses = $vaccineRecords->map(function ($dose) {
                return [
                    'dose_id' => $dose->dose_id,
                    'vaccine_date' => $dose->vaccine_date,
                    'batch_number' => $dose->batch_number,
                ];
            });

            return [
                'registration_number' => $vaccineRecords->first()->registration_number,
                'registration_date' => $vaccineRecords->first()->registration_date,
                'vaccine_type_name' => ['id' => $vaccineRecords->first()->vaccine_type_id, 'name' => $vaccineRecords->first()->vaccine_type_name],
                'vaccine_center' => ['id' => $vaccineRecords->first()->vaccine_center_id, 'name' => $vaccineRecords->first()->vaccine_center_name],
                'vaccine_id' => $vaccineRecords->first()->vaccine_id,
                'doses' => $doses->values(),
            ];
        });

        return response()->json([
            $data = $vaccines
        ], 200);
    }

    public function certificate(Request $request)
    {
        $request->validate([
            'passport_number' => 'required|string'
        ]);
        $person =  People::where('passport_number', $request->passport_number)->first();
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

    public function storeCertificateDetail(PersonStoreRequest $request)
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
        $person =  People::create([
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
            'visited_date' => Carbon::today(),
            'travel_type_id' => $validatedData['travel_type_id'],
            'country_id' => $validatedData['country_id'],
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


        $payment = People::join('visits as vs', 'people.id', '=', 'vs.people_id')
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
        $query  = DB::select(
            "select count(*) as complete_count,
            (select count(*) from vaccine_cards where epi_user_id = {$user_id} AND DATE(created_at) = CURDATE() ) as today_count
            from vaccine_cards where epi_user_id ={$user_id}"
        );


        $changePass = EpiUserPasswordChange::join('epi_users as epu', 'epi_user_password_changes.affected_user_id', '=', 'epu.id')
            ->join('documents as doc', 'epi_user_password_changes.document_id', '=', 'doc.id')
            ->select('doc.path', 'epu.full_name', 'doc.created_at')->get();



        $editData = Audit::where('user_type', 'EpiUser')
            ->where('user_id', $user_id)
            ->where('event', 'updated')
            ->where('auditable_type', 'EpiUser')
            ->select('id', 'old_values', 'new_values', 'created_at')
            ->get();


        $changedFields = $editData->map(function ($item) {
            $old = json_decode($item->old_values, true) ?? [];
            $new = json_decode($item->new_values, true) ?? [];

            $changes = [];
            foreach ($old as $key => $oldValue) {
                if (array_key_exists($key, $new) && $oldValue != $new[$key]) {
                    $changes[$key] = [
                        'old' => $oldValue,
                        'new' => $new[$key],
                    ];
                }
            }

            return [
                'id' => $item->id,
                'changed_fields' => $changes,
                'changed_at' => $item->created_at,
            ];
        })->filter(fn($item) => count($item['changed_fields']) > 0)->values();




        $data = [

            "complete_count" => $query[0]->complete_count,
            "today_count" => $query[0]->today_count,
            "password_change" => $changePass,
            "edit_data" => $changedFields,
        ];

        return response()->json([
            'data' => $data,
            'message' => __('app_translation.success'),
        ], 200, [], JSON_UNESCAPED_UNICODE);
    }
}
