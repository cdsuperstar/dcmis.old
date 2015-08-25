<?php

namespace App\models;

use LaravelBook\Ardent\Ardent;
use File;

/**
 * Class dcmodel
 * @package App\models
 */
class dcmodel extends Ardent
{
    //
    public static $rules = array(
        'name' => 'required',
        'title' => 'required',
        'ismenu' => 'required',
        'icon' => '',
        'url' => '',
        'templateurl' => '',
        'files' => '',
    );
    public static $angularrules = array(
        'name' => 'required',
        'title' => 'required',
        'ismenu' => 'required',
        'icon' => '',
        'url' => '',
        'templateurl' => '',
        'files' => '',
    );


    /**
     * @var string
     */
    protected $table = 'dcmodels';
    protected $fillable = ['name', 'title', 'ismenu', 'icon', 'url', 'templateurl', 'files'];

    public function makeModel($sTemp = "default")
    {
        $tempBase = storage_path() . "/template/$sTemp";
        $bladeDir = base_path() . "/resources/views/style/$sTemp/views/" . $this->name;
        $viewDir = public_path() . "/views/" . $this->name;
        $viewCss = $viewDir . "/" . $this->name . ".css";
        $viewJs = $viewDir . "/" . $this->name . ".js";

        if ($this->url && is_dir($tempBase)) {
            File::makeDirectory($bladeDir);
            File::makeDirectory($viewDir);

            File::copy($tempBase . "/view/model.css", $viewCss);
            File::copy($tempBase . "/view/model.js", $viewJs);
            File::copy($tempBase . "/model.blade.php", $bladeDir . "/" . $this->name . ".blade.name");
        }
    }

    public function delModel($sTemp = "default")
    {
        $bladeDir = base_path() . "/resources/views/style/$sTemp/views/" . $this->name;
        $viewDir = public_path() . "/views/" . $this->name;

        if ($this->name<>''&&(is_dir($viewDir) || is_dir($bladeDir))) {
            File::deleteDirectory($bladeDir);
            File::deleteDirectory($viewDir);
        }
    }

    /**
     *
     * @return string
     */
    public function dcmdgrp()
    {
        return $this->hasOne('App\models\dcMdGrp');
    }
}
