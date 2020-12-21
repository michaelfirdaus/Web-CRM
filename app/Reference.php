<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    public function participant(){
        return $this->belongsTo('App\Participant');
    }
}
