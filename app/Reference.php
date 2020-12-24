<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    protected $table = 'references';

    protected $guarded = [];

    public function participants(){
        return $this->hasMany('App\Participant');
    }
}
