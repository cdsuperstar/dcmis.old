<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class sysmemo extends Model
{
    //
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
