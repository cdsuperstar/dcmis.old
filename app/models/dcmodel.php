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
    /**
     * @var string
     */
    protected $table = 'dcmodels';

    /**
     *
     * @return string
     */
    public function dcmdgrp()
    {
        return $this->hasOne('App\models\dcMdGrp');
    }
}
