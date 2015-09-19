<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class userprofile extends Model
{
    //

    protected $fillable=[
        'id',
        'no',
        'name',
        'mz',
        'address',
        'signpic',
        'sex',
        'tdate',
        'phone',
        'phone1',
        'zgxl',
        'zgzt',
        'jjlxr',
        'bz',
        'schoolname',
        'schooldclass',
        'name1',
        'prelation1',
        'phone2',
        'name2',
        'prelation2',
        'phone3',
        'address1',
        'usertype',
    ];
    public function user()
    {
        return $this->belongsTo('App\User','id');
    }
}
