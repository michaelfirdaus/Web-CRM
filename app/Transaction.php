<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';

    protected $guarded = [];

    public function salesperson(){
        return $this->belongsTo('App\Salesperson');
    }

    public function coachprogram(){
        return $this->hasOne('App\CoachProgram');
    }

    public function result(){
        return $this->hasOne('App\Result');
    }

    public function participant(){
        return $this->belongsTo('App\Participant');
    }
}
