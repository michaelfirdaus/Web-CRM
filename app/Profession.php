<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{
    protected $table = 'professions';

    protected $guarded = [];

    public function participant(){
        return $this->belongsTo('App\Participant');
    }
}
