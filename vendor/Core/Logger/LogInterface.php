<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 03.09.2017
 * Time: 23:34
 */

namespace Core\Logger;


interface LogInterface
{
    public function getPath();
    public function render();
}