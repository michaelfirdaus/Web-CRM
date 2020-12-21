<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{
    public function participant(){
        return $this->belongsTo('App\Participant');
    }
}
