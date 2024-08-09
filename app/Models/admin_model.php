<?php

namespace App\Models;

use CodeIgniter\Model;

class admin_model extends Model

{
    protected $table = 'admin';
    protected $primaryKey = 'idAdmin';
    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        'idEmpleado'
    ];

    protected $useTimestamps = false;

}