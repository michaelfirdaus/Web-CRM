<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    protected $table = 'references';

    protected $guarded = [];

    public function participant(){
        return $this->hasOne('App\Participant');
    }
}
