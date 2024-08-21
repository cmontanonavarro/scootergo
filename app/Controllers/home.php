<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        // Instancia de moto_controller
        $motoController = new \App\Controllers\moto_controller();
        // Llamo a las funciones que necesito de moto_controller
        $motos = $motoController->obtenerMotos();


        // Instancia de login_controller
        $loginController = new \App\Controllers\login_controller();
        // Llamo a las funciones que necesito de login_controller
        $sidebarData = $loginController->mostrar_sidebar();

        
        // Paso valores a la vista homeView
        return view('homeView', [
            'motos' => $motos,
            'sidebarData' => $sidebarData
        ]);
    }
}
