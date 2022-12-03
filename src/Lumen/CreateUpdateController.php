<?php

namespace Tots\Installer\Lumen;

use Illuminate\Support\Facades\DB;

class CreateUpdateController extends CreateBaseController
{
    /**
     * Path del archivo a tener de base
     * @var string
     */
    protected $filePath = __DIR__ . '/../../data/lumen/create_update_controller.txt';
    /**
     * Path de la carpeta donde se va a guardar
     * @var string
     */
    protected $savePath = __DIR__ . '/../../../../../app/Http/Controllers/';

    public function run()
    {
        $this->file = str_replace('%%nameClass%%', $this->getCamelCase($this->name), $this->file);
        $this->file = str_replace('%%name%%', $this->name, $this->file);

        // Obtener las columnas de la tabla
        $columns = DB::select('DESCRIBE ' . $this->name);
        // Recorremos las columnas
        $properties = '';
        $propsValidations = '';
        foreach($columns as $column){
            if($column->Field == 'id'||$column->Field == 'created_at'||$column->Field == 'updated_at'||$column->Field == 'deleted'){
                continue;
            }
            if(stripos($column->Type, 'int') !== false){
                $propsValidations .= '            \''.$column->Field.'\' => \'required|min:3\',
                ';
                $properties .= '        $item->'.$column->Field.' = $request->input(\''.$column->Field.'\');
                ';
            }else{
                $propsValidations .= '            \''.$column->Field.'\' => \'required|min:3\',
                ';
                $properties .= '        $item->'.$column->Field.' = $request->input(\''.$column->Field.'\');
                ';
            }
        }
        $this->file = str_replace('%%properties%%', $properties, $this->file);
        $this->file = str_replace('%%properties_validate%%', $propsValidations, $this->file);
        
        try {
            mkdir($this->savePath . '/' . $this->getCamelCase($this->name), 0777, true);
        } catch (\Exception $exc) { }
        file_put_contents($this->savePath . '/' . $this->getCamelCase($this->name) . '/UpdateController.php', $this->file);

        // Agregamos route
        $this->addRoute('put', $this->name . 's/{id}', $this->getCamelCase($this->name) . '\\UpdateController');
    }
}