<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class JobconnectorParticipant extends Pivot
{
    protected $table = 'jobconnector_participant';

    protected $guarded = [];

    public function jobconnector(){
        return $this->hasOne('App\Jobconnector', 'id', 'jobconnector_id');
    }

    public function participant(){
        return $this->hasOne('App\Participant', 'id', 'participant_id');
    }

}
