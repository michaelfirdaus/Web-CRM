<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    public function transaction(){
        return $this->belongsTo('App\Transaction');
    }
}
