<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    public function programpivot(){
        return $this->belongsTo('App\ProgramPivot');
    }

    public function branch(){
        return $this->belongsTo('App\Branch');
    }
}
