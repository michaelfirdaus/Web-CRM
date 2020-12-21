<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Knowcn extends Model
{
    public function participant(){
        return $this->belongsTo('App\Participant');
    }
}
