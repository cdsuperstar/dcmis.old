<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class pxunit extends Model
{
    //
    public function pxunitgrp()
    {
        return $this->hasOne('App\models\pxunitgrp');
    }

    public function user()
    {
        return $this->hasMany('App\User');
    }

}
