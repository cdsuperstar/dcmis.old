<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class sysmsg extends Model
{
    //
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
