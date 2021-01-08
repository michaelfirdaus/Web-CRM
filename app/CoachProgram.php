<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CoachProgram extends Pivot
{
    protected $table = 'coach_program';

    protected $guarded = [];

    public function coach(){
        return $this->hasOne('App\Coach', 'id');
    }

    public function program(){
        return $this->hasOne('App\Program', 'id', 'program_id');
    }

    public function transaction(){
        return $this->belongsTo('App\Transaction', 'id', 'transaction_id');
    }

}
