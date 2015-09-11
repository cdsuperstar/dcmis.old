<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class sysnotice extends Model
{
    //
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function senPxunit()
    {
        return $this->belongsTo('App\models\pxunit','senpart');
    }
    public function recPxunit()
    {
        return $this->belongsTo('App\models\pxunit','recpart');
    }
}
