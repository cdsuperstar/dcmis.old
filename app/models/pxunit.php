<?php

namespace App\models;

use LaravelBook\Ardent\Ardent;

class pxunit extends Ardent
{
    //
    public static $rules = array(
        'name' => 'required',
        'logo' => 'required',
        'phone' => 'required',
        'web' => '',
    );
    public static $angularrules = array(
        'name' => 'required',
        'logo' => 'required',
        'phone' => 'required',
        'web' => '',
    );
    protected $table = 'pxunits';
    protected $fillable = ['name', 'logo', 'phone', 'web'];

    public function pxunitgrp()
    {
        return $this->hasOne('App\models\pxunitgrp');
    }

    public function users()
    {
        return $this->hasMany('App\User');
    }

}
