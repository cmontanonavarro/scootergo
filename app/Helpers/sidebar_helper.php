<?php

if (!function_exists('mostrar_sidebar')) {
    function mostrar_sidebar() {
        $session = session();

        if ($session->get('logged_in') === TRUE) {
            return '
                <section id="btnEditarPerfil" class="hero is-small is-primary mb-4">
                    <div class="hero-body">
                        <p class="title">EDITAR PERFIL</p>
                        <p class="subtitle">' . $session->get('nombreUsuario') . ' ' . $session->get('apellidoUsuario') . '</p>
                    </div>
                </section>
                <section id="btnGestionarReserva" class="hero is-small is-info mb-4">
                    <div class="hero-body">
                        <a href="' . base_url('#') . '">
                            <p class="title">GESTIONAR RESERVAS</p>
                            <p class="subtitle">asdfasdf</p>
                        </a>
                    </div>
                </section>
                <section id="btnLogout" class="hero is-small is-warning mb-4">
                    <div class="hero-body">
                        <a href="' . base_url('logout') . '">
                            <p class="title">CERRAR SESIÓN</p>
                            <p class="subtitle">Salir de la cuenta</p>
                        </a>
                    </div>
                </section>
                <section class="hero is-small is-link mb-4">
                    <div class="hero-body">
                        <a href="' . base_url('catalogo') . '">
                            <p class="title">VER CATÁLOGO</p>
                            <p class="subtitle">¡Echa un vistazo a todas!</p>
                        </a>
                    </div>
                </section>
                <section class="hero is-small is-link">
                    <div class="hero-body">
                        <a href="' . base_url('disponibles') . '">
                            <p class="title">VER DISPONIBLES</p>
                            <p class="subtitle">¡Elige entre las Scooter libres!</p>
                        </a>
                    </div>
                </section>';
        } else {
            return '
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
                        <a href="' . base_url('registro') . '">
                            <p class="title">CREAR CUENTA</p>
                            <p class="subtitle">¡Bienvenido a la familia!</p>
                        </a>
                    </div>
                </section>';
        }
    }
}
