<?php

namespace Tots\Installer\Lumen;

class CrudInstaller
{
    /**
     * Nombre de la DB
     *
     * @var string
     */
    public $name = '';
    /**
     * Nombre del Schema de la base de datos
     * @var string
     */
    public $schema = '';

    public function run()
    {
        $run1 = new CreateModel();
        $run1->name = $this->name;
        $run1->schema = $this->schema;
        $run1->run();

        $run2 = new CreateController();
        $run2->name = $this->name;
        $run2->schema = $this->schema;
        $run2->run();
    }
}