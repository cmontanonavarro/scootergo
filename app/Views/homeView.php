<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>

<!-- Slick -->
<link rel="stylesheet" type="text/css" href="<?= base_url('css/slick.css'); ?>"/>
<link rel="stylesheet" type="text/css" href="<?= base_url('css/slick-theme.css'); ?>"/>
<script type="text/javascript" src="<?= base_url('js/slick.min.js'); ?>"></script>

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
                    <div class="slick-class columns is-mobile"></div>

                    <!-- Flechas de navegación -->
                    <button id="slick-prev" class="button is-primary is-inverted"><i class="fas fa-chevron-left has-text-info"></i></button>
                    <button id="slick-next" class="button is-primary is-inverted"><i class="fas fa-chevron-right has-text-info"></i></button>

                </div>
            </div>
        </section>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function(){
    $('.slick-class').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        prevArrow: $('#slick-prev'),
        nextArrow: $('#slick-next')
    });
});

</script>

<script>


// Convierto el array de PHP a un JSON para usarlo en JavaScript
var motos = <?= json_encode($motos); ?>;

// Compruebo que haya al menos 1 registro
if (motos.length > 0) {
    var container = document.querySelector('.slick-class');
    motos.forEach(function(moto, index) {
        var column = document.createElement('div');
        column.className = 'column is-one-third has-text-centered';

        var img = document.createElement('img');
        img.src = moto.fotoMoto || 'https://via.placeholder.com/128';
        img.alt = moto.marcaMoto + ' ' + moto.modeloMoto;
        img.className = 'fotoCarrusel';

        var p = document.createElement('p');
        p.id = 'moto' + (index + 1);
        p.innerText = moto.marcaMoto + ' ' + moto.modeloMoto;

        column.appendChild(img);
        column.appendChild(p);
        container.appendChild(column);
    });    
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
