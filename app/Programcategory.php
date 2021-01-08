<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programcategory extends Model
{
    protected $table = 'programcategories';

    protected $guarded = [];

    public function programs(){
        return $this->belongsTo('App\Program', 'id');
    }
}
