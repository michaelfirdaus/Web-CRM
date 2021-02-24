<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Know extends Model
{
    protected $table = 'knows';

    protected $guarded = [];

    public function participant(){
        return $this->belongsTo('App\Participant');
    }
}
