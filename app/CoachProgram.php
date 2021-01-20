<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CoachProgram extends Pivot
{
    protected $table = 'coach_program';

    protected $guarded = [];

    public function coaches(){
        return $this->hasMany('App\Coach', 'id' , 'coach_id');
    }

    public function program(){
        return $this->belongsTo('App\Program', 'id');
    }

    // public function transaction(){
    //     return $this->belongsTo('App\Transaction', 'id', 'transaction_id');
    // }

}
