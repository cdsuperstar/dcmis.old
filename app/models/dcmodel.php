<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class dcmodel
 * @package App\models
 */
class dcmodel extends Model
{
    //
    public static $rules = array(
        'name'           =>'required',
        'title'          =>'required',
        'ismenu'         =>'required',
        'icon'           =>'required',
        'url'            =>'required',
        'templateurl'    =>'required',
        'files'          =>'required',
    );
    public static $angularrules = array(
        'name'           =>'required',
        'title'          =>'required',
        'ismenu'         =>'required',
        'icon'           =>'',
        'url'            =>'',
        'templateurl'    =>'',
        'files'          =>'',
    );

    /**
     * @var string
     */
    protected $table = 'dcmodels';
    protected $fillable = ['name','title','ismenu','icon','url','templateurl','files'];

    /**
     *
     * @return string
     */
    public function dcmdgrp()
    {
        return $this->hasOne('App\models\dcMdGrp');
    }
}
