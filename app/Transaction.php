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

    public function program(){
        return $this->hasOne('App\Program', 'id', 'program_id');
    }

    public function result(){
        return $this->hasOne('App\Result', 'id','transaction_id', 'result_id');
    }

    public function participant(){
        return $this->belongsTo('App\Participant');
    }
}
