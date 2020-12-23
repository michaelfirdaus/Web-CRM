<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $table = 'programs';

    protected $guarded = [];

    public function coaches(){
        // return $this->belongsToMany('App\Coach', 'coach_program', 'id', 'coach_id');
        return $this->belongsToMany('App\Coach')
                    ->using('App\CoachProgram')
                    ->withPivot('date', 'id');
    }

    public function coachprogram(){
        return $this->belongsTo('App\CoachProgram', 'program_id');
    }

    public function branch(){
        return $this->belongsTo('App\Branch');
    }
}
