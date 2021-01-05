<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{

    protected $guarded = [];

    public function participant(){
        return $this->hasOne('App\Participant', 'id', 'participant_id');
    }

    public function program(){
        return $this->hasOne('App\Program', 'id', 'program_id');
    }
}
