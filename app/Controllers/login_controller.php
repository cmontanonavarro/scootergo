<?php

namespace App\Controllers;

use App\Models\usuario_model;
use CodeIgniter\Controller;

class login_controller extends Controller
{
    public function mostrarLoginForm() {
        // Llamar al helper para obtener los datos del sidebar
        $sidebarData = mostrar_sidebar(); // Llamada al helper

        // Paso los datos del sidebar a la vista loginView
        return view('loginview', [
            'sidebarData' => $sidebarData
        ]);
    }

    public function autenticar() {
        $session = session();
        $model = new usuario_model();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Busca el usuario en la base de datos
        $user = $model->where('emailUsuario', $email)->first();

        if ($user) {
            // Verifica la contraseña
            if (password_verify($password, $user->pwUsuario)) {
                // Configura la sesión
                $session->set([
                    'idUsuario' => $user->idUsuario,
                    'nombreUsuario' => $user->nombreUsuario,
                    'apellidoUsuario' => $user->apellidoUsuario,
                    'emailUsuario' => $user->emailUsuario,
                    'logged_in' => true,
                ]);

                return redirect()->to('/');
            } else {
                $session->setFlashdata('error', 'Contraseña incorrecta');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('error', 'El correo electrónico no está registrado');
            return redirect()->to('/login');
        }
    }

    public function logout() {
        $session = session();
        $session->destroy();

        return redirect()->to('/');
    }
}
