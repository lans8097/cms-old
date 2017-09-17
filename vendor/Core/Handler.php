<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 03.09.2017
 * Time: 23:22
 */

namespace Core;

use Core\Http\Router;
use Core\Logger\LogException;
use Core\View;

class Handler
{
    protected $inSaveLog = false;
    public function __construct()
    {
        set_exception_handler([$this,'handle']);
    }
    public function handle(\Exception $e)
    {
        $e->getTraceAsString();
        if(Config::get('dev')){
            $this->showException($e);
        }else{
            (new LogException('exception', $e));
        }
        return true;
    }
    protected function showException(\Exception $e){
        $View = new View();
        echo $View->render('errors/exception',['Exception'=>$e]);
    }
}