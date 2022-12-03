<?php

namespace Tots\Installer\Lumen;

use Illuminate\Support\Facades\DB;

class CreateListController extends CreateBaseController
{
    /**
     * Path del archivo a tener de base
     * @var string
     */
    protected $filePath = __DIR__ . '/../../data/lumen/create_list_controller.txt';
    /**
     * Path de la carpeta donde se va a guardar
     * @var string
     */
    protected $savePath = __DIR__ . '/../../../../../app/Http/Controllers/';

    public function run()
    {
        $this->file = str_replace('%%nameClass%%', $this->getCamelCase($this->name), $this->file);
        $this->file = str_replace('%%name%%', $this->name, $this->file);
        
        try {
            mkdir($this->savePath . '/' . $this->getCamelCase($this->name), 0777, true);
        } catch (\Exception $exc) { }
        file_put_contents($this->savePath . '/' . $this->getCamelCase($this->name) . '/ListController.php', $this->file);

        // Agregamos route
        $this->addRoute('get', $this->name . 's/', $this->getCamelCase($this->name) . '\\ListController');
    }
}