<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 19.08.2017
 * Time: 15:40
 */

namespace Core\Traits;

trait Singleton {
    static private $instance = null;

    private function __construct() {}
    private function __clone() {}
    private function __wakeup() {}

    /**
     * @return static
     */
    static public function getInstance() {
        return
            self::$instance===null
                ? self::$instance = new static()//new self()
                : self::$instance;
    }
}