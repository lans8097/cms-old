<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 03.09.2017
 * Time: 23:34
 */

namespace Core\Logger;

class LogException extends Log
{
    protected $Exception;
    public function __construct($logName = 'exception', \Exception $exception)
    {
        $this->Exception = $exception;
        parent::__construct($logName, '');
    }
    public function render()
    {
        $message = date('H:i:s - ').' Message:'.$this->Exception->getMessage().'. file:'.$this->Exception->getFile().'. line:'.$this->Exception->getLine();
        if($this->Exception->getTraceAsString()){
            $message .=' Trace:'.$this->Exception->getTraceAsString();
        }
        return $message;
    }
}