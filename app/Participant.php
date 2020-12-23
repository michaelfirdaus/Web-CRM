<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $table = 'participants';

    protected $guarded = [];

    public function references(){
        return $this->hasMany('App\Reference');
    }

    public function profession(){
        return $this->hasOne('App\Profession');
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
        return $this->hasOne('App\Branch');
    }

    public function programs(){
        return $this->hasMany('App\Program');
    }

    public function knowcn(){
        return $this->hasOne('App\Knowcn');
    }
}
