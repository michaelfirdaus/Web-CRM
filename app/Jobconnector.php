<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jobconnector extends Model
{
    public function jobconnectorpivot(){
        return $this->belongsTo('App\JobConnectorPivot');
    }
}
