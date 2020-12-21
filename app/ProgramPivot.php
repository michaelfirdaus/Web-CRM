<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgramPivot extends Model
{
    public function coach(){
        return $this->hasOne('App\Coach');
    }

    public function program(){
        return $this->hasOne('App\Program');
    }
}
