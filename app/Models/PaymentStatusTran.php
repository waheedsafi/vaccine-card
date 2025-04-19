<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentStatusTran extends Model
{
    //
    protected $guarded = [];
    
    public function paymentStatus(){
        $this->belongsTo(PaymentStatus::class,'payment_status_id');
    }
}
