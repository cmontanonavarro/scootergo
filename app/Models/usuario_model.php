<?php

namespace App\Models;

use CodeIgniter\Model;

class usuario_model extends Model

{
    protected $table = 'usuario';
    protected $primaryKey = 'idUsuario';
    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        'emailUsuario',
        'pwUsuario',
        'dniUsuario',
        'nombreUsuario',
        'apellidoUsuario',
        'fechaNacimiento',
        'reservaMotoUsuario',
        'permisoConducirUsuario',
        'obtencionPermisoUsuario',
        'caducidadPermisoUsuario'
    ];

    protected $useTimestamps = false;

}