<?php

namespace App\Controllers;

use App\Models\usuario_model;
use CodeIgniter\Controller;
use App\Models\UsuarioModel;

class login_controller extends Controller
{

    public function mostrarLoginForm() {
        return view('loginview');
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
            if ($password === $user->pwUsuario) {
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


    public function mostrar_sidebar() {
        
        $session = session();

            if ($session->get('logged_in')) {
                $html = '
                    <section class="hero is-small is-light mb-4">
                        <div class="hero-body">
                            <p class="title">¡ Hola !</p>
                            <p class="subtitle">' . $session->get('nombreUsuario') . ' ' . $session->get('apellidoUsuario') . '</p>
                        </div>
                    </section>

                    <section class="hero is-small is-light mb-4">
                        <div class="hero-body">
                            <a href="' . base_url('logout') . '">
                                <p class="title">CERRAR SESIÓN</p>
                                <p class="subtitle">Salir de la cuenta</p>
                            </a>
                        </div>
                    </section>

                    <section class="hero is-small is-info">
                        <div class="hero-body">
                            <a href="' . base_url('#') . '">
                                <p class="title">GESTIONAR RESERVAS</p>
                                <p class="subtitle">asdfasdf</p>
                            </a>
                        </div>
                    </section>';
            } else {
                $html = '
                    <section class="hero is-small is-link mb-4">
                        <div class="hero-body">
                            <a href="' . base_url('login') . '">
                                <p class="title">INICIAR SESIÓN</p>
                                <p class="subtitle">¡Bienvenido de nuevo!</p>
                            </a>
                        </div>
                    </section>

                    <section class="hero is-small is-link">
                        <div class="hero-body">
                            <a href="' . base_url('register') . '">
                                <p class="title">CREAR CUENTA</p>
                                <p class="subtitle">¡Bienvenido a la familia!</p>
                            </a>
                        </div>
                    </section>';
            }

            return $html;
    }

}
