<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class domaine extends Model
{
    protected $guarded=[];


    public function sousdomaine(){
        return $this->hasMany('App\sousdomaine');
    }

    public function document(){
        return $this->hasMany('App\document');
    }
}
