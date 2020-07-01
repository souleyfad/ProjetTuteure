<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class document extends Model
{
    protected $guarded=[];

    public function domaine(){
        return $this->belongsTo('App\domaine');
    }

    public function sousdomaine(){
        return $this->belongsTo('App\sousdomaine');
    }
}
