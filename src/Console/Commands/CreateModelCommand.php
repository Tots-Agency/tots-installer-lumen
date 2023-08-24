<?php

namespace Tots\Installer\Console\Commands;

use Illuminate\Console\Command;
use Tots\Installer\Lumen\CreateModel;

class CreateModelCommand extends Command
{
    /**
     *
     * @var string
     */
    protected $signature = 'tots:create-model';

    protected $description = 'Create model for database table.';

    public function handle()
    {
        $schema = $this->ask('What is your schema?');
        $table = $this->ask('What is your table?');

        $service = new CreateModel();
        $service->schema = $schema;
        $service->name = $table;
        $service->run();

        $this->info("Created model for table $table.");
    }
}