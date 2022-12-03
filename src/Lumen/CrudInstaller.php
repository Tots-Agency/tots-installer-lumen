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
        $runs = [new CreateModel(), /*new CreateMigration(), */new CreateController(), new CreateListController(), new CreateUpdateBulkController(), new CreateRemoveBulkController(), new CreateFetchController(), new CreateUpdateController(), new CreateRemoveController()];
        foreach($runs as $run){
            $run->name = $this->name;
            $run->schema = $this->schema;
            $run->run();
        }
    }
}