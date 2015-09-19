<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class userprofile extends Model
{
    //

    protected $fillable=['id','no','name','sex','tdate','zgxl','zgzt','phone','phone1','jjlxr','bz','usertype'];
    public function user()
    {
        return $this->belongsTo('App\User','id');
    }
}
