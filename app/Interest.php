<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{

    protected $guarded = [];

    public function participant(){
        return $this->hasOne('App\Participant', 'id', 'participant_id');
    }

    public function programname(){
        return $this->hasOne('App\Programname', 'id', 'programname_id');
    }
}
