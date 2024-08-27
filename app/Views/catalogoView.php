<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>

<!-- Slick -->
<link rel="stylesheet" type="text/css" href="<?= base_url('css/slick.css'); ?>"/>
<link rel="stylesheet" type="text/css" href="<?= base_url('css/slick-theme.css'); ?>"/>

<div class="columns">
    
    <!-- Sidebar -->
    <div class="column is-narrow">
        <aside class="menu">

        <a href="<?= base_url('/'); ?>">
                <figure class="image is-128x128">
                    <img src="/scgo_favicon.png" alt="Logo">
                </figure>
        </a>
        
            <p class="menu-label">Menú</p>
            
            <!-- Botones disponibles en Sidebar -->
            <?= $sidebarData ?>

        </aside>
    </div>

    <!-- Main Content -->
    <div class="column">
        <section id="bckgFade" class="hero is-info is-fullheight-with-navbar">
            <div class="hero-body">
                <div class="container has-text-centered">
                    <h1 class="title">
                        ¡ScooterGo!
                    </h1>
                    <h2 class="subtitle">
                        Tu solución para movilidad con scooter de pequeña y media cilindrada
                    </h2>

                    
                </div>
            </div>
        </section>
    </div>


</div>

<script type="text/javascript">

    // Convierto el array de PHP a un JSON para usarlo en JavaScript
    var motos = <?= json_encode($motos); ?>;


    $(document).ready(function(){


    });


</script>

<style>

    /* Resalto el hover sobre las flechas del carrusel con cambio de color */
    .button:hover i.has-text-info {
        color: #00d1b2 !important;
    }
    


    /* Estilo para los botones del menu */
    #btnEditarPerfil {
        background-color: #3498db;
        color: white;
        border-radius: 5px;
    }
    
    #btnGestionarReserva {
        background-color: #f1c40f;
        color: white;
        border-radius: 5px;
    }

    #btnLogout {
        background-color: #e74c3c;
        color: black;
        border-radius: 5px;
    }
    
    .hero-body a {
        color: inherit;
        text-decoration: none;
    }

    .hero-body a:hover {
        text-decoration: underline;
    }



    /* Degradado dinámico y diagonal en el background */
    @keyframes gradientAnimation {
        0% {
            background-position: 0% 50%;
        }
        50% {
            background-position: 100% 50%;
        }
        100% {
            background-position: 0% 50%;
        }
    }

    #bckgFade {
        background: linear-gradient(135deg, #209CEE, #87CEEB, #209CEE);
        background-size: 200% 200%;
        animation: gradientAnimation 10s ease infinite;
    }

</style>

<?= $this->endSection() ?>
