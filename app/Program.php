<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $table = 'programs';

    protected $guarded = [];

    public function coaches(){
        return $this->belongsToMany('App\Coach')
                    ->using('App\CoachProgram')
                    // ->withPivot('date', 'id');
                    ->withPivot('id');
    }

    public function coachprograms(){
        return $this->hasMany('App\CoachProgram', 'program_id');
    }

    public function programcategory(){
        return $this->hasOne('App\Programcategory', 'id', 'programcategory_id');
    }

    public function branch(){
        return $this->belongsTo('App\Branch');
    }

    public function transaction(){
        return $this->belongsTo('App\Transaction', 'id', 'program_id');
    }

    public function programname(){
        return $this->hasOne('App\Programname', 'id', 'programname_id');
    }

    // public function interest(){
    //     return $this->belongsTo('App\Interest');
    // }
}
