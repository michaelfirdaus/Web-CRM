<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salesperson extends Model
{
    protected $table = 'salespeople';

    protected $guarded = [];

    public function transactions(){
        return $this->hasMany('App\Transaction');
    }
}
