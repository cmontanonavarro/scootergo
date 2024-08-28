<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>

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

                    <div class="container mt-5">
                        <div id="motos-container" class="columns is-multiline">
                        </div>
                    </div>
                    
                    <!-- Botón para cargar más -->
                    <div class="has-text-centered mt-4">
                        <button id="load-more" class="button is-info">Cargar más</button>
                    </div>

                </div>
            </div>
        </section>
    </div>


</div>

<script type="text/javascript">

    // Convierto el array de PHP a un JSON para usarlo en JavaScript
    var motos = <?= json_encode($motos); ?>;
    var motosMostradas = 0; // Contador para las motos mostradas

    function mostrarMotos(cantidad) {
        // Selecciono el contenedor donde se mostrarán las motos
        var container = $('#motos-container');

        // Muestro las motos en grupos de 3
        for (var i = motosMostradas; i < motosMostradas + cantidad && i < motos.length; i++) {
            var moto = motos[i];
            var motoCard = `
                <div class="column is-one-third">
                    <div class="card is-flex is-flex-direction-column is-justify-content-space-between">
                        <div>
                            <div class="card-image">
                                <figure class="image is-256x256">
                                    <img src="${moto.fotoMoto}" alt="${moto.modeloMoto}">
                                </figure>
                            </div>
                            <div class="card-content">
                                <div class="media">
                                    <div class="media-content">
                                        <p class="title is-4 has-text-black">${moto.marcaMoto} ${moto.modeloMoto}</p>
                                        <p class="subtitle is-6 has-text-grey-dark">${moto.cilindradaMoto} cc - ${moto.cvMoto} CV</p>
                                    </div>
                                </div>
                                <div class="content has-text-dark">
                                    <p><strong>ABS:</strong> ${moto.absMoto == 1 ? "Sí" : "No"}</p>
                                    <p><strong>Peso:</strong> ${moto.pesoMoto} kg</p>
                                    <p><strong>Descripción:</strong> ${moto.descripcionMoto}</p>
                                    <p><strong>Precio por día:</strong> €${moto.precioDiaMoto}</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="card-footer-item is-flex is-align-items-center">
                                <a href="/reserva/${moto.idMoto}" id="btnReservar" class="button is-rounded is-fullwidth" title="Haz click para reservar esta moto">
                                    <span class="icon">
                                        <i class="fas fa-check"></i>
                                    </span>
                                    <span>¡Reserva ya!</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            container.append(motoCard); // Añado tarjeta al contenedor
        }

        motosMostradas += cantidad; // Actualizo el contador de motos mostradas

        // Si ya no hay más motos por mostrar, oculto el botón
        if (motosMostradas >= motos.length) {
            $('#load-more').hide();
        }
    }

    $(document).ready(function(){
        // Muestro las primeras 3 motos
        mostrarMotos(3);

        // Animación para el botón de carga
        $('#load-more').addClass('pulse-animation');

        // Evento para el botón de cargar más
        $('#load-more').click(function() {
            // Cambio texto del botón a "Cargando..." y lo desactivo temporalmente
            var boton = $(this);
            boton.addClass('is-loading');
            boton.prop('disabled', true);

            // Carga antes de mostrar fotos
            setTimeout(function() {
                mostrarMotos(3);

                // Reestablezco botón a su estado original
                boton.removeClass('is-loading');
                boton.prop('disabled', false);

                // Si no hay más motos, oculto botón
                if (motosMostradas >= motos.length) {
                    boton.hide();
                }
            }, 1000);
        });
    });
</script>

<style>

    /* ESTILO EN BOTONES MENU (SIDEBAR) */
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
    /* FIN BLOQUE CSS ESTILO EN BOTONES MENU (SIDEBAR) */



    /* FLEXBOX CARDS BULMA */
    .card.is-flex {
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .card-content.is-flex-grow-1 {
        flex-grow: 1;
    }
    /* FIN BLOQUE CSS FLEXBOX CARDS BULMA */


    
    /* EFECTOS BOTÓN RESERVA YA */
    #btnReservar {
    transition: all 0.3s ease-in-out;
    }
    #btnReservar:hover {
        transform: scale(1.05);
        box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
    }
    #btnReservar {
        background: linear-gradient(270deg, #209CEE, #87CEEB, #209CEE);
        background-size: 400% 400%;
        animation: gradientAnimation 5s ease infinite;
    }

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
    /* FIN BLOQUE CSS EFECTOS BOTÓN RESERVA YA */



    /* ANIMACIÓN BOTÓN CARGAR MÁS */
    @keyframes pulse {
        0% {
            transform: scale(1);
            box-shadow: 0 0 0 rgba(0, 123, 255, 0.5);
        }
        50% {
            transform: scale(1.05);
            box-shadow: 0 0 20px rgba(0, 123, 255, 0.7);
        }
        100% {
            transform: scale(1);
            box-shadow: 0 0 0 rgba(0, 123, 255, 0.5);
        }
    }

    .pulse-animation {
        animation: pulse 1.5s infinite;
    }
    /* FIN BLOQUE CSS ANIMACIÓN BOTÓN CARGAR MÁS */


    /* DEGRADADO DINÁMICO Y DIAGONAL EN BACKGROUND */
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
    /* FIN BLOQUE CSS DEGRADADO DINÁMICO Y DIAGONAL EN BACKGROUND */

</style>

<?= $this->endSection() ?>
