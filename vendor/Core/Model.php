<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 04.09.2017
 * Time: 0:28
 */

namespace Core;


use Core\Db\Db;

class Model
{
    protected $Db;

    public function __construct()
    {
        $this->Db = Db::getInstance();
    }

}