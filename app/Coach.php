<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    protected $table = 'coaches';

    protected $guarded = [];

    public function programs(){
        return $this->belongsToMany('App\Program')
                    ->using('App\CoachProgram')
                    ->withPivot('date', 'id');
    }

    public function coachprogram(){
        return $this->belongsTo('App\CoachProgram', 'coach_id');
    }
}
