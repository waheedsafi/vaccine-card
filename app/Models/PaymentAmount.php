<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentAmount extends Model
{
    //
    protected $guarded = [];


    public function vaccinePayment(){
        $this->hasMany(VaccinePayment::class,'payment_amount_id','id');
    }
}
