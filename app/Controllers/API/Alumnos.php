<?php

namespace App\Controllers\API;


use App\Models\AlumnoModel;
use CodeIgniter\RESTful\ResourceController;

class Alumnos extends ResourceController
{
    public function __construct(){
        $this->model = $this->setModel(new AlumnoModel());
    }

    

  public function datosAlumnos($id = null){
    try {
      $modelAlumno = new AlumnoModel();
        if($id == null)
        return $this->failValidationErrors('No se ha pasado un numero de control valido');

        $alumno = $modelAlumno->find($id);
        if($alumno == null)
        return $this->failNotFound('No se encontro el alumno con el numero de control: '.$id);
        $alumnos = $this->model->datoAlumno($id);
        return $this->respond($alumnos);

    }catch(\Exception $e){
      return $this->failServerError($e,'Error en el servidor');
    }
  }

  

}
