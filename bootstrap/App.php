<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 03.09.2017
 * Time: 22:38
 */

use Core\Config;
use Core\Http;
class App
{
    protected $Config;
    protected $Router;
    protected $Require;
    protected $Controller;

    public function __construct()
    {
        $this->Config  = Config::getInstance();
        $this->Require = new Http\Request();
        $this->Router  = Http\Router::getInstance();
        $this->Router->setRequireUri($this->Require->getUri());
        require PATH_APP.DS.'router.php';
        if($this->Router->run()){
            $this->runController();
        }
    }

    private function runController()
    {
        $action = $this->Router->getAction();
        $params = $this->Router->getParams();
        $controller = $this->Router->getController();
        if(class_exists($controller)){
            $this->Controller = new $controller();
            if(method_exists($this->Controller,$action)){
                call_user_func_array([$this->Controller,$action],$params);
                return true;
            }else{
                throw new Exception('Action does not exist "'.$controller.'->'.$action.'()"');
            }
        }else{
            throw new Exception('Controller does not exist "'.$controller.'->'.$action.'()"');
        }
    }
}