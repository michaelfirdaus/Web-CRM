<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function salesperson(){
        return $this->belongsTo('App\SalesPerson');
    }

    public function programpivot(){
        return $this->hasOne('App\ProgramPivot');
    }

    public function result(){
        return $this->hasOne('App\Result');
    }

    public function participant(){
        return $this->belongsTo('App\Participant');
    }
}
