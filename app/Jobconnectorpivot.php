<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jobconnectorpivot extends Model
{
    protected $table = 'jobconnectorpivots';

    protected $guarded = [];

    public function participant(){
        return $this->belongsTo('App\Participant');
    }

    public function jobconnector(){
        return $this->hasOne('App\Jobconnector');
    }
}
