<?php

namespace Tots\Installer\Lumen;

use Tots\Installer\AbstractOpenFile;

abstract class CreateBaseController extends AbstractOpenFile
{
    /**
     * Nombre de la tabla en la DB
     *
     * @var string
     */
    public $name = '';

    public function addRoute($nameHandler, $withParams = '', $isAuth = false, $extraPath = '', $methods = '')
    {
        /*$route = new Route();
        $route->name = $this->name;
        $route->nameHandler = $nameHandler;
        $route->paramsRequired = $withParams;
        $route->isAuth = $isAuth;
        $route->extraPath = $extraPath;
        if($methods != ''){
            $route->methods = $methods;
        }
        $route->run();*/
    }
}