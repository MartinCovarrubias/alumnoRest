<?php namespace App\Models;

use CodeIgniter\Model;

class EspecialidadModel extends Model {

    protected $table         = 'especialidad';
    protected $primaryKey    = 'idEspecialidad';

    protected $returnType    = 'array';
    protected $allowedFields = ['nombre_especialidad'];

    protected $useTimestamps = true; //para usar created_at y updated_at
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules    = [
       'nombre_carrera' => 'required|alpha_space|min_length[3]|max_length[100]'
    ];

    protected $skipValidation = false;

 
}