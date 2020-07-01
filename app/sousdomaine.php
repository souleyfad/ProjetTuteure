<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sousdomaine extends Model
{
    protected $guarded=[];

    public function domaine(){
        return $this->belongsTo('App\domaine');
    }
    
    public function document(){
        return $this->hasMany('App\document');
    }
}
