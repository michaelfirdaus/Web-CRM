<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programname extends Model
{
    protected $table = 'programnames';

    protected $guarded = [];

    public function program(){
        return $this->belongsTo('App\Program', 'id');
    }

    public function interest(){
        return $this->belongsTo('App\Interest', 'id');
    }
}
