<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    protected $table = 'coaches';

    protected $guarded = [];

    public function programpivot(){
        return $this->belongsTo('App\Programpivot');
    }
}
