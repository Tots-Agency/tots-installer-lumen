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

    public function addRoute($method, $path, $controller = '', $isAuth = false)
    {
        $route = new AddRoute();
        $route->name = $path;
        $route->method = $method;
        $route->controller = $controller;
        $route->run();
    }
}