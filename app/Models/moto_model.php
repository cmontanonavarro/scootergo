<?php

namespace App\Models;

use CodeIgniter\Model;

class moto_model extends Model

{
    protected $table = 'moto';
    protected $primaryKey = 'idMoto';
    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        'matriculaMoto',
        'marcaMoto',
        'modeloMoto',
        'cilindradaMoto',
        'cvMoto',
        'absMoto',
        'pesoMoto',
        'descripcionMoto',
        'precioDiaMoto',
        'disponibleMoto',
        'mantenimiento'
    ];

    protected $useTimestamps = false;

}