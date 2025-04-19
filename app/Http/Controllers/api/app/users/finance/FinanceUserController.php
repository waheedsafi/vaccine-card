<?php

namespace App\Http\Controllers\api\app\users\finance;

use App\Enums\RoleEnum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;

class FinanceUserController extends Controller
{
    //


    public function user($id)
    {
        $locale = App::getLocale();

        $user = DB::table('finance_users as u')
            ->where('u.id', $id)
            ->join('model_job_trans as mjt', function ($join) use ($locale) {
                $join->on('mjt.model_job_id', '=', 'u.job_id')
                    ->where('mjt.language_name', $locale);
            })
            ->leftJoin('contacts as c', 'c.id', '=', 'u.contact_id')
            ->join('emails as e', 'e.id', '=', 'u.email_id')
            ->join('roles as r', 'r.id', '=', 'u.role_id')
            ->join('destination_trans as dt', function ($join) use ($locale) {
                $join->on('dt.destination_id', '=', 'u.destination_id')
                    ->where('dt.language_name', $locale);
            })
            ->leftJoin('zone_trans as zt', function ($join) use ($locale) {
                $join->on('zt.zone_id', '=', 'u.zone_id')
                    ->where('zt.language_name', $locale);
            })
            ->leftJoin('province_trans as prot', function ($join) use ($locale) {
                $join->on('prot.province_id', '=', 'u.province_id')
                    ->where('zt.language_name', $locale);
            })
            ->select(
                'u.id',
                'u.registeration_number',
                "u.profile",
                "u.status",
                'u.full_name',
                'u.username',
                'c.value as contact',
                'u.contact_id',
                'e.value as email',
                'u.email_id',
                'r.name as role_name',
                'u.role_id',
                'dt.value as destination',
                'zt.value as zone',
                'prot.value as province',
                "mjt.value as job",
                "u.created_at",
                "u.province_id",
                "u.destination_id",
                "u.job_id",
                "u.zone_id",

            )
            ->first();
        if (!$user) {
            return response()->json([
                'message' => __('app_translation.user_not_found'),
            ], 404, [], JSON_UNESCAPED_UNICODE);
        }

        return response()->json(
            [
                "user" => [
                    "id" => $user->id,
                    "full_name" => $user->full_name,
                    "username" => $user->username,
                    'email' => $user->email,
                    "profile" => $user->profile,
                    "status" => $user->status == 1,
                    "role" => ['id' => $user->role_id, 'name' => $user->role_name],
                    "zone" => ['id' => $user->zone_id, 'name' => $user->zone],
                    "provine" => ['id' => $user->province_id, 'name' => $user->province],
                    'contact' => $user->contact,
                    "destination" => ["id" => $user->destination_id, "name" => $user->destination],
                    "job" => ["id" => $user->job_id, "name" => $user->job],
                    "created_at" => $user->created_at,
                ],
            ],
            200,
            [],
            JSON_UNESCAPED_UNICODE
        );
    }

    public function users(Request $request)
    {
        $locale = App::getLocale();
        $tr = [];
        $perPage = $request->input('per_page', 10); // Number of records per page
        $page = $request->input('page', 1); // Current page


        $request->user()->role_id;

        $includeRole = [RoleEnum::finance_user->value];

        if ($request->user()->role_id  === RoleEnum::epi_super->value) {
            $includeRole = [RoleEnum::finance_admin->value, RoleEnum::epi_user->value];
        }


        // Start building the query
        $query = DB::table('finance_users as usr')
            ->whereIn('usr.role_id', $includeRole)
            ->leftJoin('contacts as c', 'c.id', '=', 'usr.contact_id')
            ->join('emails as e', 'e.id', '=', 'usr.email_id')
            ->join('roles as r', 'r.id', '=', 'usr.role_id')
            ->leftjoin('destination_trans as dt', function ($join) use ($locale) {
                $join->on('dt.destination_id', '=', 'usr.destination_id')
                    ->where('dt.language_name', $locale);
            })
            ->leftjoin('zone_trans as zt', function ($join) use ($locale) {
                $join->on('zt.zone_id', '=', 'usr.zone_id')
                    ->where('zt.language_name', $locale);
            })
            ->leftjoin('model_job_trans as mjt', function ($join) use ($locale) {
                $join->on('mjt.model_job_id', '=', 'usr.job_id')
                    ->where('mjt.language_name', $locale);
            })
            ->select(
                "usr.id",
                "usr.registeration_number",
                "usr.full_name",
                "usr.username",
                "usr.profile",
                "usr.created_at",
                "e.value AS email",
                "c.value AS contact",
                "zt.value AS zone",
                "dt.value as destination",
                "mjt.value as job"
            );

        $this->applyDate($query, $request);
        $this->applyFilters($query, $request);
        $this->applySearch($query, $request);

        // Apply pagination (ensure you're paginating after sorting and filtering)
        $tr = $query->paginate($perPage, ['*'], 'page', $page);
        return response()->json(
            [
                "users" => $tr,
            ],
            200,
            [],
            JSON_UNESCAPED_UNICODE
        );
    }



    protected function applyDate($query, $request)
    {
        // Apply date filtering conditionally if provided
        $startDate = $request->input('filters.date.startDate');
        $endDate = $request->input('filters.date.endDate');

        if ($startDate) {
            $query->where('n.created_at', '>=', $startDate);
        }
        if ($endDate) {
            $query->where('n.created_at', '<=', $endDate);
        }
    }
    // search function 
    protected function applySearch($query, $request)
    {
        $searchColumn = $request->input('filters.search.column');
        $searchValue = $request->input('filters.search.value');

        if ($searchColumn && $searchValue) {
            $allowedColumns = [
                'registration_no' => 'usr.registration_no',
                'full_name' => 'usr.full_name',
                'contact' => 'c.value',
                'email' => 'e.value',
                'zone' => 'zt.value',
                'destination' => 'dt.value'
            ];
            // Ensure that the search column is allowed
            if (in_array($searchColumn, array_keys($allowedColumns))) {
                $query->where($allowedColumns[$searchColumn], 'like', '%' . $searchValue . '%');
            }
        }
    }
    // filter function
    protected function applyFilters($query, $request)
    {
        $sort = $request->input('filters.sort'); // Sorting column
        $order = $request->input('filters.order', 'asc'); // Sorting order (default 
        $allowedColumns = [
            'full_name' => 'usr.full_name',
            'contact' => 'c.value',
            'zone' => 'zt.value'

        ];
        if (in_array($sort, array_keys($allowedColumns))) {
            $query->orderBy($allowedColumns[$sort], $order);
        }
    }
}
