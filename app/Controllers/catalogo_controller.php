<?php

namespace App\Controllers;

use App\Controllers\login_controller;
use App\Models\moto_model;

class catalogo_controller extends BaseController
{
    public function index()
    {
        // Instancio moto_model y llamo a función
        $motoModel = new moto_model();
        $motos = $motoModel->findAll();

        // Instancio login_controller y llamo a función
        $loginController = new login_controller();
        $sidebarData = $loginController->mostrar_sidebar();

        // Paso los datos a la vista
        return view('catalogoView', [
            'motos' => $motos,
            'sidebarData' => $sidebarData
        ]);
    }
}
