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
        return $this->hasOne('App\Program', 'id');
    }

    public function transaction(){
        return $this->belongsto('App\Transaction');
    }

}
