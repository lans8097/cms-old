<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 03.09.2017
 * Time: 23:08
 */

namespace Core\Http;
class Request
{
    protected $requireUri;
    protected $get     = [];
    protected $post    = [];
    protected $file    = [];
    protected $cookies = [];
    public function __construct()
    {
        $this->get = $_GET;
        $this->post = $_POST;
        $this->file = $_FILES;
        $this->cookies = $_COOKIE;
        $this->requireUri = $_SERVER['REQUEST_URI'];
    }
    public function getUri()
    {
        return $this->requireUri;
    }
    public function get()
    {
        return $this->get;
    }
    public function post()
    {
        return $this->post;
    }
    public function file()
    {
        return $this->file;
    }
    public function cookies()
    {
        return $this->cookies;
    }
}