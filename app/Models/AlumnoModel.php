<?php namespace App\Models;

use CodeIgniter\Model;

class AlumnoModel extends Model {

    protected $table         = 'alumno';
    protected $primaryKey    = 'numeroControl';

    protected $returnType    = 'array';
    protected $allowedFields = ['numeroControl','nombre','apellidoP','apellidoM','fecha_nacimiento','semestre_actual','idcarrera','idespecialidad'];

   

    protected $validationRules    = [
        'numeroControl' => 'required|integer|is_unique[alumno.numeroControl]',
        'nombre'          => 'required|alpha_space|min_length[3]|max_length[50]',
        'apellidoP'       => 'required|alpha_space|min_length[3]|max_length[50]',
        'apellidoM'       => 'required|alpha_space|min_length[3]|max_length[50]',
        'fecha_nacimiento'=> 'required|valid_date[Y-m-d]',
        'semestre_actual' => 'required|numeric|max_length[3]',
        'idcarrera'       =>  'required|integer|is_valid_carrera',
        'idespecialidad'  =>  'required|integer|is_valid_especialidad',
        
    ];

    //para mandar mensajes de error
    protected $validationMessages = [
        'numeroControl' => [
            'required' => 'El numero de control es requerido',
            'integer' => 'El numero de control debe ser un numero entero',
            'is_unique' => 'El numero de control ya existe'
        ]];
       

    protected $skipValidation = false;
    
    public function datoAlumno($id = null){
     
      $builder = $this->db->table($this->table);
      $builder ->select('alumno.numeroControl AS NumeroControl, alumno.nombre, alumno.apellidoP, alumno.apellidoM, alumno.fecha_nacimiento, alumno.semestre_actual');
      $builder ->select('carrera.nombre_carrera AS Carrera, especialidad.nombre_especialidad AS Especialidad');
      $builder ->select('YEAR(CURDATE()) - YEAR(alumno.fecha_nacimiento) AS Edad');
      $builder ->join('carrera', 'carrera.idCarrera = alumno.idcarrera');
      $builder ->join('especialidad', 'especialidad.idEspecialidad = alumno.idespecialidad');
      $builder ->where('alumno.numeroControl', $id);
      $query = $builder->get();
    return $query->getResult();
     }

}