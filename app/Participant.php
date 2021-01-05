<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $table = 'participants';

    protected $guarded = [];

    public function reference(){
        return $this->belongsTo('App\Reference');
    }

    public function profession(){
        return $this->belongsTo('App\Profession');
    }

    public function jobconnectors(){
        return $this->belongsToMany('App\Jobconnector')
                    ->using('App\JobconnectorParticipant')
                    ->withPivot('date', 'application_status');
    }

    public function jobconnectorparticipant(){
        return $this->belongsTo('App\JobconnectorParticipant', 'participant_id');
    }

    public function branch(){
        return $this->belongsTo('App\Branch');
    }

    public function knowcn(){
        return $this->belongsTo('App\Knowcn');
    }

    public function interests(){
        return $this->belongsTo('App\Interest');
    }

}
