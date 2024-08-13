<?php

namespace App\Controllers;

use App\Models\moto_model;

class moto_controller extends BaseController

{

    public function obtenerMotoRandom() {
        // Creo instancia del modelo
        $motoModel = new moto_model();

        // Recupero ID de moto aleatoria
        $randomMoto = $motoModel->orderBy('RAND()')->first();

        return $randomMoto;
    }

    public function mostrarFotoMotoCarrusel() {
        // Foto a mostrar en caso de no foto
        $nofoto = "https://via.placeholder.com/150";

        // Recupero una moto aleatoria
        $moto = $this->obtenerMotoRandom();
        
        // Estructura de control para mostrar una foto u otra según resultado
        if ($moto) {
            $fotoMoto = base_url($moto->fotoMoto);
            return $fotoMoto;
        } else {
            return $nofoto;
        }       
    }

}