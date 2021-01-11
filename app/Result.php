<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $table = 'results';

    protected $guarded = [];

    public function transaction(){
        return $this->belongsTo('App\Transaction', 'id');
    }
}
