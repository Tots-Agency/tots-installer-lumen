<?php

namespace Tots\Installer\Lumen;

use Tots\Installer\AbstractOpenFile;

class AddRoute extends AbstractOpenFile
{
    /**
     * Path del archivo a tener de base
     * @var string
     */
    protected $filePath = __DIR__ . '/../../../../../routes/api.php';
    /**
     * Path de la carpeta donde se va a guardar
     * @var string
     */
    protected $savePath = __DIR__ . '/../../../../../routes/api.php';
    /**
     * Nombre de la DB
     *
     * @var string
     */
    public $name = '';
    /**
     * get, post, put, delete
     * @var string
     */
    public $method = 'get';
    /**
     *
     * @var boolean
     */
    public $isAuth = true;
    /**
     *
     * @var string
     */
    public $controller = 'CreateController';

    public function run()
    {
        if($this->method == 'get'){
            $addRoute = '$router->get(\'/'.$this->name.'\', [\'middleware\' => \'auth\', \'uses\' => App\\Http\\Controllers\\' . $this->controller . '::class .\'@handle\']);';
        } else if($this->method == 'post') {
            $addRoute = '$router->post(\'/'.$this->name.'\', [\'middleware\' => \'auth\', \'uses\' => App\\Http\\Controllers\\' . $this->controller . '::class .\'@handle\']);';
        } else if($this->method == 'put') {
            $addRoute = '$router->put(\'/'.$this->name.'\', [\'middleware\' => \'auth\', \'uses\' => App\\Http\\Controllers\\' . $this->controller . '::class .\'@handle\']);';
        } else if($this->method == 'delete') {
            $addRoute = '$router->delete(\'/'.$this->name.'\', [\'middleware\' => \'auth\', \'uses\' => App\\Http\\Controllers\\' . $this->controller . '::class .\'@handle\']);';
        }

        $this->file .= '
        ' . $addRoute;
        file_put_contents($this->savePath, $this->file);
    }
}