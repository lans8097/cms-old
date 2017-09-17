<?php
ini_set("display_errors",true);
error_reporting(E_ALL);
//Обявление констант
define('DS',DIRECTORY_SEPARATOR);
define('ROOT',realpath('..'.DS));
define('PATH_APP',ROOT.DS.'App');
define('PATH_VIEW',ROOT.DS.'resources'.DS.'views');
define('PATH_LANG',ROOT.DS.'resources'.DS.'lang');
define('PATH_LOGS',ROOT.DS.'tmp'.DS.'logs');
define('PATH_CONFIG',ROOT.DS.'config');
define('PATH_VENDOR',ROOT.DS.'vendor');

require ROOT.DS.'bootstrap'.DS.'NamespaceAutoload.php';
require ROOT.DS.'bootstrap'.DS.'functions.php';
require ROOT.DS.'bootstrap'.DS.'App.php';

(new NamespaceAutoload())->register();
(\Core\Config::getInstance())->add('app');
(new \Core\Handler());
(new App());
