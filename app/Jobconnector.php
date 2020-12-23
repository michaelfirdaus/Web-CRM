<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jobconnector extends Model
{
    protected $table = 'jobconnectors';

    protected $guarded = [];

    public function participants(){
        return $this->belongsToMany('App\Participant')
                    ->using('App\JobconnectorParticipant')
                    ->withPivot('date', 'application_status');
    }

    public function jobconnectorparticipant(){
        return $this->belongsTo('App\JobconnectorParticipant', 'jobconnector_id');
    }
}
