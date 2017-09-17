<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 03.09.2017
 * Time: 23:34
 */

namespace Core\Logger;

class Log implements LogInterface
{
    protected $logName = 'log';
    protected $message = '';
    public function __construct($logName = 'log', $message)
    {
        $this->logName = $logName;
        $this->message = $message;
        Logger::getInstance()->add($this);
    }
    /**
     * @return string filePath
     */
    public function getPath()
    {
        return PATH_LOGS.DS.$this->logName.date('-d-m-y').'.log';
    }
    /**
     * @return string Log Body
     */
    public function render()
    {
        return date('H:i:s - ').$this->message;
    }
}