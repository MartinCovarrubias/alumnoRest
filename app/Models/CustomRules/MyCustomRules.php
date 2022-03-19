<?php namespace App\Models\CustomRules;

use App\Models\EspecialidadModel;
use App\Models\CarreraModel;
class MyCustomRules
{
   public function is_valid_carrera(int $id): bool{

    $model = new CarreraModel();
    $carrera = $model->find($id);

    return $carrera == null ? false : true;

 
   }

   public function is_valid_especialidad(int $id): bool{

    $model = new EspecialidadModel();
    $especialidad = $model->find($id);

    return $especialidad == null ? false : true;

 
   }

   
  

    
}