<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    public function programpivot(){
        return $this->belongsTo('App\ProgramPivot');
    }
}
