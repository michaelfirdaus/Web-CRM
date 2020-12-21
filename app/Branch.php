<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    public function programs(){
        return $this->hasMany('App\Program');
    }

    public function participants(){
        return $this->hasMany('App\Participant');
    }
}
