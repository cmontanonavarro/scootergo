<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        // Creo instancia de moto_controller
        $motoController = new \App\Controllers\moto_controller();

        // Llamo al método en moto_controller que recupera una foto
        $fotoMoto = $motoController->mostrarFotoMotoCarrusel();

        // Paso valores a la vista homeView
        return view('homeView', ['fotoMoto' => $fotoMoto]);
    }
}
