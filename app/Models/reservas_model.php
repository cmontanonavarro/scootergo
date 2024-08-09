<?php

namespace App\Models;

use CodeIgniter\Model;

class reservas_model extends Model

{
    protected $table = 'reservas';
    protected $primaryKey = 'idReserva';
    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        'idUsuario',
        'idMoto',
        'fechaInicioReserva',
        'fechaFinReserva'
    ];

    protected $useTimestamps = false;

}