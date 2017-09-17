<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 04.09.2017
 * Time: 0:30
 */

namespace Core\Db;

use Core\Config;
use Core\Traits\Singleton;
class Db
{
    use Singleton;
    protected $Db;

    public function __construct()
    {
        $config = Config::load('db');
        $this->Db = new \mysqli($config['host'], $config['login'], $config['password'], $config['db_name'], $config['post']);
        if ($this->Db->connect_errno) {
            throw new \Exception("Не удалось подключиться к MySQL: " . $this->Db->connect_error, '');
        } elseif (!$this->Db->set_charset($config['charset'])) {
            throw new \Exception("Не удалось приминить кадеровку " . $config['charset'], '');
        }
    }

    public function query($query)
    {
        return $this->Db->query($query);
    }
}