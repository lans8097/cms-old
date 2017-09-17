<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 03.09.2017
 * Time: 23:10
 */

namespace Core\Http;


use Core\Traits\Singleton;
use Core\View;
class Router
{
    use Singleton;
    const DEFAULT_CONTROLLER = 'Home';
    const DEFAULT_ACTION = 'index';
    protected $uri;
    protected $routes = [];
    protected $params = [];
    protected $controller;
    protected $action;
    protected $patterns = [
        ':seg' => '([^\/]+)',
        ':num'  => '([0-9]+)',
        ':any'  => '(.+)'
    ];
    /**
     * @param string $url /page/:seg|:num|:any
     * @param string $control Controller@Action
     * @return $this
     */
    public function add($url, $control)
    {
        $rout = array_combine(['controller','action'],explode('@', $control));
        if(empty($rout['controller'])) $rout['controller'] = self::DEFAULT_CONTROLLER;
        if(empty($rout['action'])) $rout['action'] = self::DEFAULT_ACTION;
        $this->routes[$url] = $rout;
        return $this;
    }
    /**
     * @param string $key
     * @param string $pattern
     * @return $this
     */
    public function addPattern($key, $pattern)
    {
        $this->patterns[$key][$pattern];
        return $this;
    }
    /**
     * @return bool
     */
    public function run()
    {
        $uri     = $this->uri;
        foreach ($this->routes as $pattern => $route){
            //replace pattern
            $pattern = strtr($pattern,$this->patterns);
            //parsing rout
            if(preg_match('#^'.$pattern.'$#', $uri, $params)){
                $this->controller = 'App\Controllers\\'.$route['controller'];
                $this->action = $route['action'];
                unset($params[0]);
                $this->params = $params;
                return true;
            }
        }
        self::error404();
    }
    /**
     * @param string $uri request uri
     * @return $this
     */
    public function setRequireUri($uri){
        $this->uri = urldecode(strtok($uri,'?'));
        return $this;
    }
    /**
     * @return string request uri
     */
    public function getRequireUri(){
        return $this->uri;
    }
    /**
     * @return string controller name
     */
    public function getController(){ return $this->controller;}
    /**
     * @return string controller action
     */
    public function getAction(){ return $this->action;}
    /**
     * @return array params
     */
    public function getParams() { return $this->params;}
    public static function redirect($url, $code = 301, $replace = true)
    {
        header('location:'.$url,$replace, $code);
        die();
    }
    public static function error404()
    {
        header('Page not found', true, 404);
        $view = new View();
        die($view->render('errors/404'));
    }
}