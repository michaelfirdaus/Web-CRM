<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $table = 'branches';

    protected $guarded = [];

    public function programs(){
        return $this->hasMany('App\Program');
    }

    public function participants(){
        return $this->hasMany('App\Participant');
    }
}
