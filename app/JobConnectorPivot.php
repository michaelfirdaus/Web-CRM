<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobConnectorPivot extends Model
{
    public function participant(){
        return $this->belongsTo('App\Participant');
    }

    public function jobconnector(){
        return $this->hasOne('App\JobConnector');
    }
}
