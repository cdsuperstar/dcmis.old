<?php

namespace App\models;

use Baum\Node;

class pxunitgrp extends Node
{
    //
    protected $table = 'pxunitgrps';

    // 'parent_id' column name
    protected $parentColumn = 'parent_id';

    // 'lft' column name
    protected $leftColumn = 'lft';

    // 'rgt' column name
    protected $rightColumn = 'rgt';

    // 'depth' column name
    protected $depthColumn = 'depth';

    // guard attributes from mass-assignment
    protected $guarded = array('id', 'parent_id', 'lft', 'rgt', 'depth');

    public function pxunit()
    {
        return $this->belongsTo('App\models\pxunit');
    }

}
