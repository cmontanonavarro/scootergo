<?php

namespace App\Controllers;

use App\Controllers\login_controller;
use App\Models\moto_model;

class catalogo_controller extends BaseController
{

    public function catalogo()
    {
        // Instancio moto_model y llamo a función
        $motoModel = new moto_model();
        $motos = $motoModel->findAll();

        // Muestro el sidebar con el helper
        $sidebarData = mostrar_sidebar();

        // Paso los datos a la vista
        return view('catalogoView', [
            'motos' => $motos,
            'sidebarData' => $sidebarData
        ]);
    }

    public function disponibles()
    {
        // Instancio moto_model y llamo a función
        $motoModel = new moto_model();
        $motos = $motoModel->findAll();

        // Muestro el sidebar con el helper
        $sidebarData = mostrar_sidebar();

        // Paso los datos a la vista
        return view('disponiblesView', [
            'motos' => $motos,
            'sidebarData' => $sidebarData
        ]);
    }

}
