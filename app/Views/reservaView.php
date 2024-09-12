<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>

<div class="columns">
    
    <!-- Sidebar -->
    <div class="column is-narrow">
        <aside class="menu">

            <a href="<?= base_url('/'); ?>">
                <figure class="image is-128x128 mb-5">
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
        <section class="hero is-info is-fullheight-with-navbar">
            <div class="hero-body">
                <div class="container">

                    <!-- Detalles de la Moto -->
                    <div class="box has-text-centered">
                        <h1 class="title is-3 has-text-dark">VAS A RESERVAR: <br> <?= esc($moto->marcaMoto . ' ' . $moto->modeloMoto); ?></h1>

                        <!-- Imagen de la moto -->
                        <figure class="image is-flex is-justify-content-center mb-4">
                            <img src="<?= esc($moto->fotoMoto); ?>" alt="Foto de la Moto" style="width: 100%; max-width: 600px; height: auto; object-fit: contain;">
                        </figure>

                        <h2 class="subtitle is-5 mb-4">Detalles de la Moto:</h2>
                        
                        <!-- Atributos de la moto -->
                        <div class="columns is-multiline is-mobile">
                            <div class="column is-half">
                                <div class="box has-text-left">
                                    <p><strong>Cilindrada:</strong> <?= esc($moto->cilindradaMoto); ?> cc</p>
                                    <p><strong>Potencia:</strong> <?= esc($moto->cvMoto); ?> cv</p>
                                    <p><strong>ABS:</strong> <?= esc($moto->absMoto); ?></p>
                                </div>
                            </div>
                            <div class="column is-half">
                                <div class="box has-text-left">
                                    <p><strong>Peso:</strong> <?= esc($moto->pesoMoto); ?> kg</p>
                                    <p><strong>Matrícula:</strong> <?= esc($moto->matriculaMoto); ?></p>
                                    <p><strong>Precio por día:</strong> <?= esc($moto->precioDiaMoto); ?> €</p>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Formulario de reserva -->
                    <div class="box">
                        <h2 class="title is-4">Formulario de Reserva</h2>
                        <form action="/reserva/procesar" method="post">
                            <input type="hidden" name="motoId" value="<?= esc($motoId); ?>">

                            <!-- Fecha de la reserva -->
                            <div class="field">
                                <label class="label" for="fecha">Fecha de Reserva</label>
                                <div class="control has-icons-left">
                                    <input class="input" type="date" name="fecha" id="fecha" required>
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-calendar-alt"></i>
                                    </span>
                                </div>
                            </div>

                            <!-- Número de días -->
                            <div class="field">
                                <label class="label" for="dias">Número de Días</label>
                                <div class="control">
                                    <input class="input" type="number" name="dias" id="dias" placeholder="Ingrese el número de días" required>
                                </div>
                            </div>

                            <!-- Botón de enviar -->
                            <div class="field is-grouped is-grouped-centered">
                                <div class="control">
                                    <button type="submit" class="button is-primary is-medium">Reservar</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </section>
    </div>

</div>

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
</style>

<?= $this->endSection()?>