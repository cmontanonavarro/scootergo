<?php

namespace App\Controllers;

use App\Models\moto_model;

class moto_controller extends BaseController

{

    public function obtenerMotos() {
        // Creo instancia del modelo
        $motoModel = new moto_model();

        // Recupero todos los registros
        $motos = $motoModel->findAll();

        return $motos;
    }

}