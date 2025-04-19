<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\CallLike;

class Reciept extends Model
{
    //
    protected $guarded = [];



    public function vaccinePayment(){

        $this->belongsTo(VaccinePayment::class,'vaccine_payment_id','id');
    }

    public function vaccineCard() {
        $this->hasOne(VaccineCard::class,'vaccine_payment_id','vaccine_payment_id');
    }

    public function document() {
        $this->belongsTo(Document::class,'document_id','id');
    }

    public function financeUser(){
        $this->belongsTo(FinanceUser::class,'finance_user_id');
    }
}
