<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class commentaire extends Model
{
    protected $guarded = [];

    public function document()
    {
        return $this->morphTo();
    }

    public function User()
    {
        return $this->belongsTo('App\User');
    }
}
