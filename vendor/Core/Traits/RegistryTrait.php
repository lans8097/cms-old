<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 19.08.2017
 * Time: 13:25
 */

namespace Core\Traits;


trait RegistryTrait
{
    /**
     * @var array
     */
    protected static $array =[];
    /**
     * @var array in lock kay array
     */
    protected static $lock =[];

    /**
     * @param $key
     * @return mixed|null
     */
    public static function get($key)
    {
        return self::exists($key)?self::$array[$key]:null;
    }

    /**
     * @param string $kay
     * @param mixed $value
     * @param bool $lock
     */
    public static function set($kay, $value, $lock = false)
    {
        if(!self::isLock($kay))
        {
            self::$array[$kay] = $value;
            if($lock) self::$lock[] = $kay;
        }
    }

    /**
     * @param $key
     */
    public static function remove($key)
    {
        if(!self::isLock($key)) {
            unset(self::$array[$key]);
        }
    }

    /**
     * @param $key
     * @return bool
     */
    protected static function isLock($key)
    {
        return in_array($key,self::$lock);
    }

    /**
     * @param $key
     * @return bool
     */
    protected static function exists($key)
    {
        return isset(self::$array[$key]);
    }
}