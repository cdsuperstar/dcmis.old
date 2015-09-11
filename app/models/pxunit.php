<?php

namespace App\models;

use LaravelBook\Ardent\Ardent;

class pxunit extends Ardent
{
    //
    public static $rules = array(
        'name' => 'required',
        'phone' => 'required',
        'web' => '',
        'logo' => '',
    );
    public static $angularrules = array(
        'name' => 'required',
        'phone' => 'required',
        'web' => '',
        'logo' => '',
    );
    protected $table = 'pxunits';
    protected $fillable = ['name', 'phone', 'web','logo'];

    public function pxunitgrp()
    {
        return $this->hasOne('App\models\pxunitgrp');
    }

    public function users()
    {
        return $this->hasMany('App\User');
    }

}
