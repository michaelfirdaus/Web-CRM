<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobConnector extends Model
{
    public function jobconnectorpivot(){
        return $this->belongsTo('App\JobConnectorPivot');
    }
}
