<?php

namespace App\Http\Controllers\api\template;

use App\Models\Email;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Traits\Helper\HelperTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Http\Requests\template\user\ProfileUpdateRequest;

class ProfileController extends Controller
{
    use HelperTrait;

    public function deleteProfilePicture(Request $request)
    {
        $authUser = $request->user();
        // 1. delete old profile
        $this->deleteDocument($this->getProfilePath($authUser->profile));
        // 2. Update the profile
        $authUser->profile = null;
        $authUser->save();
        return response()->json([
            'message' => __('app_translation.success')
        ], 200, [], JSON_UNESCAPED_UNICODE);
    }
    public function updateUserPicture(Request $request)
    {
        $request->validate([
            'profile' => 'nullable|mimes:jpeg,png,jpg|max:2048',
        ]);
        return $this->savePicture($request, 'user-profile');
    }
    public function updateNgoPicture(Request $request)
    {
        $request->validate([
            'profile' => 'nullable|mimes:jpeg,png,jpg|max:2048',
        ]);
        return $this->savePicture($request, 'ngo-profile');
    }
    public function updateDonorPicture(Request $request)
    {
        $request->validate([
            'profile' => 'nullable|mimes:jpeg,png,jpg|max:2048',
        ]);
        return $this->savePicture($request, 'donor-profile');
    }
    public function savePicture(Request $request, $dynamic_path)
    {
        $authUser = $request->user();
        $path = $this->storeProfile($request, $dynamic_path);
        if ($path != null) {
            // 1. delete old profile
            $this->deleteDocument($this->getProfilePath($authUser->profile));
            // 2. Update the profile
            $authUser->profile = $path;
        }
        $authUser->save();
        return response()->json([
            'message' => __('app_translation.profile_changed'),
            "profile" => $authUser->profile
        ], 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function updateUserProfileInfo(ProfileUpdateRequest $request)
    {
        $request->validated();
        $authUser = $request->user();
        // Begin transaction
        DB::beginTransaction();
        // 2. Get Email
        $email = Email::where('value', $request->email)
            ->select('id')->first();
        // Email Is taken by someone
        if ($email) {
            if ($email->id == $authUser->email_id) {
                $email->value = $request->email;
                $email->save();
            } else {
                return response()->json([
                    'message' => __('app_translation.email_exist'),
                ], 409, [], JSON_UNESCAPED_UNICODE);
            }
        } else {
            $email = Email::where('id', $authUser->email_id)->first();
            $email->value = $request->email;
            $email->save();
        }
        $contact = Contact::where('value', $request->contact)
            ->select('id')->first();
        if ($contact) {
            if ($contact->id == $authUser->contact_id) {
                $contact->value = $request->contact;
                $contact->save();
            } else {
                return response()->json([
                    'message' => __('app_translation.contact_exist'),
                ], 409, [], JSON_UNESCAPED_UNICODE);
            }
        } else {
            $contact = Contact::where('id', $authUser->contact_id)->first();
            $contact->value = $request->contact;
            $contact->save();
        }
        $authUser->full_name = $request->full_name;
        $authUser->username = $request->username;
        $authUser->save();
        DB::commit();

        return response()->json([
            'message' => __('app_translation.profile_changed'),
        ], 200, [], JSON_UNESCAPED_UNICODE);
    }
    public function ngoProfileInfo($ngo_id)
    {
        $locale = App::getLocale();

        // $data = $this->ngoRepository->ngoProfileInfo($ngo_id, $locale);
        // if (!$data) {
        //     return response()->json([
        //         'message' => __('app_translation.ngo_not_found'),
        //     ], 404);
        // }

        // return response()->json([
        //     'ngo' => $data,
        // ], 200, [], JSON_UNESCAPED_UNICODE);
    }
}
