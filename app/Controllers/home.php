<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        // Creo instancia de moto_controller
        $motoController = new \App\Controllers\moto_controller();

        // Llamo a la función en moto_controller que recupera todas las motos
        $motos = $motoController->obtenerMotos();

        // Paso valores a la vista homeView
        return view('homeView', ['motos' => $motos]);
    }
}
