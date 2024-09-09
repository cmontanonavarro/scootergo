<?php

namespace App\Controllers;

use App\Models\usuario_model;
use App\Models\moto_model;
use CodeIgniter\Controller;

class reserva_controller extends Controller
{
    
    public function comprobacion_reserva($idMoto) {
        // Obtener la sesión del usuario
        $session = session();

        // Verificar si el usuario está logueado
        if (!$session->get('logged_in')) {
            return redirect()->to('/login');
        }

        // Cargar el modelo de motos
        $motoModel = new moto_model();
        $moto = $motoModel->find($idMoto);

        // Verificar si la moto existe
        if (!$moto) {
            return redirect()->to('/catalogo'); 
        }

        // Llamar al helper para obtener los datos del sidebar
        $sidebarData = mostrar_sidebar();

        // Pasar los datos de la moto y del sidebar a la vista
        return view('reservaView', [
            'motoId' => $idMoto,
            'moto' => $moto,
            'sidebarData' => $sidebarData
        ]);
    }


}
