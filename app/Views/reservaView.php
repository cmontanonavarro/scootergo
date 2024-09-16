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
                        <form id="reservaForm">
                            <input type="hidden" name="motoId" value="<?= esc($motoId); ?>">

                            <!-- Fecha de inicio -->
                            <div class="field">
                                <label class="label" for="fechaInicio">Fecha de Inicio</label>
                                <div class="control has-icons-left">
                                    <input class="input" type="date" name="fechaInicio" id="fechaInicio" required>
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-calendar-alt"></i>
                                    </span>
                                </div>
                            </div>

                            <!-- Fecha de fin -->
                            <div class="field">
                                <label class="label" for="fechaFin">Fecha de Fin</label>
                                <div class="control has-icons-left">
                                    <input class="input" type="date" name="fechaFin" id="fechaFin" required>
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-calendar-alt"></i>
                                    </span>
                                </div>
                            </div>

                            <!-- Botón de revisar -->
                            <div class="field is-grouped is-grouped-centered">
                                <div class="control">
                                    <button type="button" class="button is-primary is-medium" id="revisarReserva">CONTINUAR</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Modal -->
                    <div class="modal" id="reservaModal">
                        <div class="modal-background"></div>
                        <div class="modal-card">
                            <header class="modal-card-head has-background-info">
                                <p class="modal-card-title has-text-white">Confirmar Reserva</p>
                                <button class="delete" aria-label="close" id="closeModal"></button>
                            </header>
                            <section class="modal-card-body has-text-dark">
                                <p><strong>Moto:</strong> <?= esc($moto->marcaMoto . ' ' . $moto->modeloMoto); ?></p>
                                <p><strong>Fecha de Inicio:</strong> <span id="fechaInicioModal"></span></p>
                                <p><strong>Fecha de Fin:</strong> <span id="fechaFinModal"></span></p>
                                <p><strong>Precio por día:</strong> <?= esc($moto->precioDiaMoto); ?> €</p>
                                <p><strong>Precio total:</strong> <span id="precioTotalModal"></span> €</p>
                            </section>
                            <footer class="modal-card-foot">
                                <button class="button is-success" id="confirmarReserva">Confirmar</button>
                                <button class="button" id="cancelarReserva">Cancelar</button>
                            </footer>
                        </div>
                    </div>







                </div>
            </div>
        </section>
    </div>

</div>

<script>

    // Función para formatear la fecha en un formato legible
    function formatearFechaCompleta(fecha) {
        const opciones = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        const fechaObj = new Date(fecha);
        return fechaObj.toLocaleDateString('es-ES', opciones);
    }

    // Función para calcular la diferencia de días
    function calcularDiferenciaDias(fechaInicio, fechaFin) {
        const inicio = new Date(fechaInicio);
        const fin = new Date(fechaFin);
        const diferenciaTiempo = fin.getTime() - inicio.getTime();
        return Math.ceil(diferenciaTiempo / (1000 * 3600 * 24)); // Convierte el tiempo en días
    }

    // Abrir modal y mostrar datos
    document.getElementById('revisarReserva').addEventListener('click', function () {
        const fechaInicio = document.getElementById('fechaInicio').value;
        const fechaFin = document.getElementById('fechaFin').value;
        const precioDiaMoto = <?= $moto->precioDiaMoto; ?>;

        if (fechaInicio && fechaFin) {
            // Formatear las fechas antes de mostrarlas
            document.getElementById('fechaInicioModal').textContent = formatearFechaCompleta(fechaInicio);
            document.getElementById('fechaFinModal').textContent = formatearFechaCompleta(fechaFin);

            // Calcular la diferencia de días
            const dias = calcularDiferenciaDias(fechaInicio, fechaFin);

            // Calcular el precio total
            const precioTotal = dias * precioDiaMoto;
            document.getElementById('precioTotalModal').textContent = precioTotal.toFixed(2); // Mostrar con dos decimales

            document.getElementById('reservaModal').classList.add('is-active');
        } else {
            alert('Por favor, selecciona ambas fechas.');
        }
    });

    // Cerrar modal
    document.getElementById('closeModal').addEventListener('click', function () {
        document.getElementById('reservaModal').classList.remove('is-active');
    });

    // Cancelar reserva
    document.getElementById('cancelarReserva').addEventListener('click', function () {
        document.getElementById('reservaModal').classList.remove('is-active');
    });

    // Confirmar reserva
    document.getElementById('confirmarReserva').addEventListener('click', function () {
        document.getElementById('reservaForm').submit(); // Enviar el formulario después de la confirmación
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
</style>

<?= $this->endSection()?>