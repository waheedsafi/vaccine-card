<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    //
    protected $guarded = [];

    public function vaccine(){

        $this->hasMany(Vaccine::class,'people_id','id');
    }

    public function address() {
        $this->belongsTo(Address::class,'address_id');

    }
    public function country() {
        $this->belongsTo(Country::class,'country_id');
    }
    public function gender(){
        $this->belongsTo(Gender::class,'gender_id');
    }

    public function epiUser() {
        $this->belongsTo(EpiUser::class,'epi_user_id');  
    }

}
