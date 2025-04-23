<?php

namespace App\Http\Controllers\api\auth;

use App\Enums\LanguageEnum;
use App\Models\Email;
use Illuminate\Http\Request;
use App\Traits\Helper\HelperTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Http\Requests\auth\LoginRequest;
use App\Repositories\User\UserRepositoryInterface;
use Sway\Utils\StringUtils;
use App\Enums\StatusTypeEnum;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\template\user\UpdateProfilePasswordRequest;
use App\Models\EpiUser;

class EpiAuthController extends Controller
{
    use HelperTrait;
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function user(Request $request)
    {
        $locale = App::getLocale();
        $user = $request->user();

        $user = DB::table('epi_users as eu')
            ->where('eu.id', $user->id)
            ->join('model_job_trans as mjt', function ($join) use ($locale) {
                $join->on('mjt.model_job_id', '=', 'eu.job_id')
                    ->where('mjt.language_name', $locale);
            })
            ->leftJoin('contacts as c', 'c.id', '=', 'eu.contact_id')
            ->join('emails as e', 'e.id', '=', 'eu.email_id')
            ->join('genders as g', 'g.id', '=', 'eu.gender_id')
            ->join('province_trans as pt', function ($join) use ($locale) {
                $join->on('pt.province_id', '=', 'eu.province_id')
                    ->where('pt.language_name', $locale);
            })
            ->join('zone_trans as zt', function ($join) use ($locale) {
                $join->on('zt.zone_id', '=', 'eu.zone_id')
                    ->where('zt.language_name', $locale);
            })
            ->join('roles as r', 'r.id', '=', 'eu.role_id')
            ->join('destination_trans as dt', function ($join) use ($locale) {
                $join->on('dt.destination_id', '=', 'eu.destination_id')
                    ->where('dt.language_name', $locale);
            })->select(
                'eu.id',
                'eu.registeration_number',
                "eu.profile",
                "eu.status",
                'eu.full_name',
                'eu.username',
                'c.value as contact',
                'eu.contact_id',
                'e.value as email',
                'r.name as role_name',
                'eu.role_id',
                'dt.value as destination',
                "mjt.value as job",
                "eu.created_at",
                "eu.disabled_parmanently",
                "g.name_en",
                "g.name_fa",
                "g.name_ps",
                "pt.value as province",
                "zt.value as zone",
            )
            ->first();
        $gender = $user->name_en;
        if ($locale == LanguageEnum::farsi->value) {
            $gender = $user->name_fa;
        } else if ($locale == LanguageEnum::pashto->value) {
            $gender = $user->name_ps;
        }
        return response()->json(
            [
                "user" => [
                    "id" => $user->id,
                    "registeration_number" => $user->registeration_number,
                    "full_name" => $user->full_name,
                    "username" => $user->username,
                    'email' => $user->email,
                    "profile" => $user->profile,
                    "status" => (bool) $user->status,
                    "role" => ["role" => $user->role_id, "name" => $user->role_name],
                    'contact' => $user->contact,
                    "destination" => $user->destination,
                    "job" => $user->job,
                    "created_at" => $user->created_at,
                    "disabled_parmanently" => $user->disabled_parmanently,
                    "gender" => $gender,
                    "province" => $user->province,
                    "zone" => $user->zone,
                ],
                "permissions" => $this->userRepository->epiAuthFormattedPermissions($user->id),
            ],
            200,
            [],
            JSON_UNESCAPED_UNICODE
        );
    }
    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();
        $locale = App::getLocale();
        $email = Email::where('value', '=', $credentials['email'])->first();
        if (!$email) {
            return response()->json([
                'message' => __('app_translation.email_not_found'),
            ], 404, [], JSON_UNESCAPED_UNICODE);
        }
        $loggedIn = Auth::guard('epi:api')->attempt([
            "email_id" => $email->id,
            "password" => $request->password,
        ]);
        if ($loggedIn) {
            // Get the auth user
            $user = $loggedIn['user'];
            if ($user->status != 1 || $user->disabled_parmanently == 1) {
                return response()->json([
                    'message' => __('app_translation.account_is_lock'),
                ], 401, [], JSON_UNESCAPED_UNICODE);
            }

            $user = DB::table('epi_users as eu')
                ->where('eu.id', $user->id)
                ->join('model_job_trans as mjt', function ($join) use ($locale) {
                    $join->on('mjt.model_job_id', '=', 'eu.job_id')
                        ->where('mjt.language_name', $locale);
                })
                ->leftJoin('contacts as c', 'c.id', '=', 'eu.contact_id')
                ->join('roles as r', 'r.id', '=', 'eu.role_id')
                ->join('genders as g', 'g.id', '=', 'eu.gender_id')
                ->join('province_trans as pt', function ($join) use ($locale) {
                    $join->on('pt.province_id', '=', 'eu.province_id')
                        ->where('pt.language_name', $locale);
                })
                ->join('zone_trans as zt', function ($join) use ($locale) {
                    $join->on('zt.zone_id', '=', 'eu.zone_id')
                        ->where('zt.language_name', $locale);
                })
                ->join('destination_trans as dt', function ($join) use ($locale) {
                    $join->on('dt.destination_id', '=', 'eu.destination_id')
                        ->where('dt.language_name', $locale);
                })->select(
                    'eu.id',
                    "eu.registeration_number",
                    "eu.profile",
                    "eu.status",
                    'eu.full_name',
                    'eu.username',
                    'c.value as contact',
                    'eu.contact_id',
                    'r.name as role_name',
                    'eu.role_id',
                    'dt.value as destination',
                    "mjt.value as job",
                    "eu.created_at",
                    "eu.disabled_parmanently",
                    "g.name_en",
                    "g.name_fa",
                    "g.name_ps",
                    "pt.value as province",
                    "zt.value as zone",
                )
                ->first();

            $this->storeUserLog($request, $user->id, StringUtils::getModelName(EpiUser::class), "Login");
            $gender = $user->name_en;
            if ($locale == LanguageEnum::farsi->value) {
                $gender = $user->name_fa;
            } else if ($locale == LanguageEnum::pashto->value) {
                $gender = $user->name_ps;
            }
            return response()->json(
                [
                    "token" => $loggedIn['tokens']['access_token'],
                    "permissions" => $this->userRepository->epiAuthFormattedPermissions($user->id),
                    "user" => [
                        "id" => $user->id,
                        "registeration_number" => $user->registeration_number,
                        "full_name" => $user->full_name,
                        "username" => $user->username,
                        'email' => $credentials['email'],
                        "profile" => $user->profile,
                        "status" => (bool) $user->status,
                        "role" => ["role" => $user->role_id, "name" => $user->role_name],
                        'contact' => $user->contact,
                        "destination" => $user->destination,
                        "job" => $user->job,
                        "created_at" => $user->created_at,
                        "disabled_parmanently" => $user->disabled_parmanently,
                        "gender" => $gender,
                        "province" => $user->province,
                        "zone" => $user->zone,
                    ],
                ],
                200,
                [],
                JSON_UNESCAPED_UNICODE
            );
        } else {
            return response()->json([
                'message' => __('app_translation.user_not_found')
            ], 404, [], JSON_UNESCAPED_UNICODE);
        }
    }

    public function logout(Request $request)
    {
        $this->storeUserLog($request, $request->user()->id, StringUtils::getModelName(EpiUser::class), "Logout");

        $request->user()->invalidateToken(); // Calls the invalidateToken method defined in the trait
        return response()->json([
            'message' => __('app_translation.user_logged_out_success')
        ], 204, [], JSON_UNESCAPED_UNICODE);
    }
}
