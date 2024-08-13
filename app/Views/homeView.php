<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>

<!-- Sidebar -->
<div class="columns">
    <div class="column is-one-fifth">
        <aside class="menu">
            <figure class="image is-128x128">
                <img src="/scgo_favicon.png" alt="Logo">
            </figure>
            <p class="menu-label">Menú</p>
            <section class="hero is-small is-link mb-4">
                <div class="hero-body">
                    <a href="#">
                    <p class="title">INICIAR SESIÓN</p>
                    <p class="subtitle">¡Bienvenido de nuevo!</p>
                    </a>
                </div>
            </section>

            <section class="hero is-small is-link">
                <div class="hero-body">
                    <a href="#">
                    <p class="title">CREAR CUENTA</p>
                    <p class="subtitle">¡Bienvenido a la familia!</p>
                    </a>
                </div>
            </section>

        </aside>
    </div>

    <!-- Main Content -->
    <div class="column">
        <section class="hero is-info is-fullheight-with-navbar">
            <div class="hero-body">
                <div class="container has-text-centered">
                    <h1 class="title">
                        ¡ScooterGo!
                    </h1>
                    <h2 class="subtitle">
                        Tu solución para movilidad con scooter de pequeña y media cilindrada
                    </h2>
                    <div class="field">
                        <div class="control">
                            <input class="input" type="text" placeholder="¿Qué scooter estás buscando?">
                        </div>
                    </div>
                    
                    <!-- Carrusel -->
                    <div class="columns is-vcentered">
                        <div class="column is-1">
                            <a class="button is-primary is-inverted"><i class="fas fa-chevron-left"></i></a>
                        </div>
                        <div class="column">
                            <div class="box has-text-centered">
                                <figure class="image is-128x128">
                                    <img src="<?= $fotoMoto ?>" alt="Moto1">
                                </figure>
                                <p>(Moto1)</p>
                            </div>
                        </div>
                        <div class="column">
                            <div class="box has-text-centered">
                                <figure class="image is-128x128">
                                    <img src="<?= $fotoMoto ?>" alt="Moto2">
                                </figure>
                                <p>(Moto2)</p>
                            </div>
                        </div>
                        <div class="column">
                            <div class="box has-text-centered">
                                <figure class="image is-128x128">
                                    <img src="<?= $fotoMoto ?>" alt="Moto3">
                                </figure>
                                <p>(Moto3)</p>
                            </div>
                        </div>
                        <div class="column is-1">
                            <a class="button is-primary is-inverted"><i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<?= $this->endSection() ?>
