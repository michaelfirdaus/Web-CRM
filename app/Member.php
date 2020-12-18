<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $guarded = [];

    public function participant(){
        return $this->belongsTo('App\Participant');
    }
}
