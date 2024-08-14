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
                            <a class="button is-primary is-inverted"><i class="fas fa-chevron-left has-text-info"></i></a>
                        </div>
                        <div class="column">
                            <div class="box has-text-centered">
                                <figure class="image is-128x128">
                                    <img src="" alt="Moto1">
                                </figure>
                                <p id="moto1"></p>
                            </div>
                        </div>
                        <div class="column">
                            <div class="box has-text-centered">
                                <figure class="image is-128x128">
                                    <img src="" alt="Moto2">
                                </figure>
                                <p id="moto2"></p>
                            </div>
                        </div>
                        <div class="column">
                            <div class="box has-text-centered">
                                <figure class="image is-128x128">
                                    <img src="" alt="Moto3">
                                </figure>
                                <p id="moto3"></p>
                            </div>
                        </div>
                        <div class="column is-1">
                            <a class="button is-primary is-inverted"><i class="fas fa-chevron-right has-text-info"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<script>


    // Convierto el array de PHP a un JSON para usarlo en JavaScript
    var motos = <?= json_encode($motos); ?>;

    // Compruebo que haya al menos 1 registro
    if (motos.length > 0) {
        
        // Modifico src, alt y p de la primera moto
        document.querySelector('img[alt="Moto1"]').src = motos[0].fotoMoto || 'https://via.placeholder.com/128'; 
        document.querySelector('img[alt="Moto1"]').alt = motos[0].marcaMoto + ' ' + motos[0].modeloMoto;
        document.getElementById('moto1').innerText = motos[0].marcaMoto + ' ' + motos[0].modeloMoto;

        // Modifico src, alt y p de la segunda moto
        if (motos.length > 1) {
            document.querySelector('img[alt="Moto2"]').src = motos[1].fotoMoto || 'https://via.placeholder.com/128';
            document.querySelector('img[alt="Moto2"]').alt = motos[1].marcaMoto + ' ' + motos[1].modeloMoto;
            document.getElementById('moto2').innerText = motos[1].marcaMoto + ' ' + motos[1].modeloMoto;
        }
        
        // Modifico src, alt y p de la tercera moto
        if (motos.length > 2) {
            document.querySelector('img[alt="Moto3"]').src = motos[2].fotoMoto || 'https://via.placeholder.com/128';
            document.querySelector('img[alt="Moto3"]').alt = motos[2].marcaMoto + ' ' + motos[2].modeloMoto;
            document.getElementById('moto3').innerText = motos[2].marcaMoto + ' ' + motos[2].modeloMoto;
        }

    } else {
        console.error("No hay motos disponibles para mostrar en el carrusel.");
    }

</script>


<style>

    /* Resalto el hover sobre las flechas del carrusel con cambio de color */
    .button:hover i.has-text-info {
        color: #00d1b2 !important;
    }


</style>

<?= $this->endSection() ?>
