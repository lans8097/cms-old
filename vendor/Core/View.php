<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 03.09.2017
 * Time: 23:11
 */
namespace Core;

use Core\Exception\MyException;

class View
{
    protected $date = [];
    protected $temp;
    protected $layoutFile =null;

    public function __construct()
    {
        //default date
        $this->date = [
            'title' => Config::get('site_name')
        ];
        $this->date['Template'] = $this;
    }

    public function addDate(array $date)
    {
        $this->date = array_merge($this->date, $date);
        return $this;
    }

    public function setExtends($layoutName)
    {
        $this->layoutFile = $layoutName;
        return $this;
    }

    public function load($fileName,array $date = [])
    {
        $path = PATH_VIEW.DS.$fileName.'.php';
        if(file_exists($path)){
            ob_start('','','');
        }else{
            throw new MyException('template file not found. path:'.$path);
        }
    }


    public function render($fileName,array $date =[])
    {
        $path = PATH_VIEW.DS.$fileName.'.php';
        if(file_exists($path)){

        }else{
            throw new MyException('template file not found. path:'.$path);
        }
    }
}