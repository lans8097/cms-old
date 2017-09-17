<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 03.09.2017
 * Time: 23:35
 */

namespace Core\Logger;

use Core\Traits\Singleton;
class Logger
{
    use Singleton;
    protected $logs = [];
    public function add(LogInterface $Log)
    {
        $this->logs[] = $Log;
    }
    public function __destruct()
    {
        //save all logs
        foreach ($this->logs as $log)
        {
            file_put_contents($log->getPath(), $log->render().PHP_EOL, FILE_APPEND);
        }
    }
}