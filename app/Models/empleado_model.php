<?php

namespace App\Models;

use CodeIgniter\Model;

class empleado_model extends Model

{
    protected $table = 'empleado';
    protected $primaryKey = 'idEmpleado';
    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        'activo',
        'emailEmpleado',
        'pwEmpleado',
        'nombreEmpleado',
        'apellidoEmpleado',
        'esAdmin'
    ];

    protected $useTimestamps = false;

}