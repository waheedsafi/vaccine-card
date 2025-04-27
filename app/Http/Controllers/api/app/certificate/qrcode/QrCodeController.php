<?php

namespace App\Http\Controllers\api\app\certificate\qrcode;

use App\Http\Controllers\Controller;
use App\Traits\Card\VaccineCardTrait;
use Illuminate\Http\Request;

class QrCodeController extends Controller
{
    //
    use VaccineCardTrait;

    public function search($id)
    {

        $data =  $this->qrcodeData($id);;

        return response()->json([
            'message' => __('app_translation.success'),
            'data' => $data
        ], 200);
    }
}
