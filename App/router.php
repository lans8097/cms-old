<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 28.08.2017
 * Time: 1:08
 */

$Router = \Core\Http\Router::getInstance();

$Router->add('/','Home@index');
$Router->add('/registry','Auth\Registry@showForm');