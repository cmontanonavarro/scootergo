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
        <section class="hero is-info is-fullheight-with-navbar">
            <div class="hero-body">
                <div class="container">
                    <div class="box has-text-centered">
                    <h1 class="title is-3">Reserva la moto: <?= esc($moto->marcaMoto . ' ' . $moto->modeloMoto); ?></h1>
                    <h2 class="subtitle is-5 mb-4">Detalles de la Moto:</h2>
                        <div class="content">
                            <ul>
                                <li><strong>Cilindrada:</strong> <?= esc($moto->cilindradaMoto); ?> cc</li>
                                <li><strong>Potencia:</strong> <?= esc($moto->cvMoto); ?> cv</li>
                                <li><strong>ABS:</strong> <?= esc($moto->absMoto); ?></li>
                                <li><strong>Peso:</strong> <?= esc($moto->pesoMoto); ?> kg</li>
                                <li><strong>Precio por día:</strong> <?= esc($moto->precioDiaMoto); ?> €</li>
                            </ul>
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

<?= $this->endSection() ?>
