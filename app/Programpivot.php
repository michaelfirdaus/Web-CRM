<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programpivot extends Model
{
    protected $table = 'programpivots';

    protected $guarded = [];

    public function coach(){
        return $this->hasOne('App\Coach');
    }

    public function program(){
        return $this->hasOne('App\Program');
    }
}
