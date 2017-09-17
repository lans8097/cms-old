<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 26.08.2017
 * Time: 11:17
 */

namespace Core;


use Core\Traits\RegistryTrait;
use Core\Traits\Singleton;

class Config
{
    use Singleton;
    use RegistryTrait;

    public function add($name, $lock = false)
    {
        $array = self::load($name);
        if(is_array($array)){
            foreach ($array as $key => $value) {
                self::set($key, $value, $lock);
            }
        }else{
            trigger_error('The configuration file must return an array.',E_ERROR);
        }

        return $this;
    }

    public static function load($name)
    {
        $path = PATH_CONFIG.DS.$name.'.php';
        if(file_exists($path))
        {
           return require $path;
        }
        trigger_error('config file not found '.$name.'.', E_ERROR);
    }
}