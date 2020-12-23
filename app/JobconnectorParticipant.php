<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class JobconnectorParticipant extends Pivot
{
    protected $table = 'jobconnector_participant';

    protected $guarded = [];

    public function jobconnector(){
        return $this->hasOne('App\Jobconnector', 'id');
    }

    public function participant(){
        return $this->hasOne('App\Participant', 'id');
    }

}
