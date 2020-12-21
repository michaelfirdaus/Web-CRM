<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    public function reference(){
        return $this->hasOne('App\Reference');
    }

    public function profession(){
        return $this->hasOne('App\Profession');
    }

    public function jobconnectorpivots(){
        return $this->hasMany('App\JobConnectorPivot');
    }

    public function branch(){
        return $this->hasOne('App\Branch');
    }

    public function programs(){
        return $this->hasMany('App\Program');
    }

    public function knowcn(){
        return $this->hasOne('App\KnowCN');
    }
}
