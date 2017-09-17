<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 02.08.2017
 * Time: 0:39
 */

class NamespaceAutoload
{
    // карта для соответствия неймспейса пути в файловой системе
    private $namespacesMap = [
        'App'            =>ROOT.DS.'app',
        'App\Models'     =>ROOT.DS.'app'.DS.'Models',
        'App\Controllers'=>ROOT.DS.'App'.DS.'Controllers',
        'Core'           =>PATH_VENDOR.DS.'Core'
    ];

    public function addNamespace($namespace, $rootDir)
    {
        if (is_dir($rootDir)) {
            $this->namespacesMap[$namespace] = $rootDir;
            return true;
        }

        return false;
    }

    public function register()
    {
        spl_autoload_register(array($this, 'autoload'));
    }

    private function autoload($class)
    {

        $pathParts = explode('\\', $class);

        if (is_array($pathParts)) {
            $namespace = array_shift($pathParts);

            if (!empty($this->namespacesMap[$namespace])) {
                $filePath = $this->namespacesMap[$namespace] . '/' . implode('/', $pathParts) . '.php';
                if(file_exists($filePath)){
                    require_once $filePath;
                    return true;
                }else{
                    throw new \Core\Exception\MyException('Class not found path:'.$filePath);
                }
            }
        }

        return false;
    }
}