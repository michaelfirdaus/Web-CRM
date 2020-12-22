<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Knowcn extends Model
{
    protected $table = 'knowcns';

    protected $guarded = [];

    public function participant(){
        return $this->belongsTo('App\Participant');
    }
}
