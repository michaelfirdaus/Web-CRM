<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jobconnector extends Model
{
    protected $table = 'jobconnectors';

    protected $guarded = [];

    public function jobconnectorpivot(){
        return $this->belongsTo('App\JobConnectorPivot');
    }
}
