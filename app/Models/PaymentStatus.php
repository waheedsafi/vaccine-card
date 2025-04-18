<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentStatus extends Model
{
    //
    protected $guarded = [];


    public function vaccinePayment(){
        $this->hasMany(VaccinePayment::class,'payment_status_id','id');
    }
    
    public function paymentStatusTran(){
        $this->hasMany(PaymentStatusTran::class,'payment_status_id','id');
    }

}
