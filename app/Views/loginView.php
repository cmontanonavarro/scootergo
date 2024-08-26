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
            
            <section class="hero is-small is-link mb-4">
                <div class="hero-body">
                    <a href="<?= base_url('login'); ?>">
                        <p class="title">INICIAR SESIÓN</p>
                        <p class="subtitle">¡Bienvenido de nuevo!</p>
                    </a>
                </div>
            </section>

            <section class="hero is-small is-link">
                <div class="hero-body">
                    <a href="<?= base_url('#'); ?>">
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
                        ¡Bienvenido de nuevo!
                    </h1>
                    <h2 class="subtitle">
                        Ingresa tus credenciales para continuar
                    </h2>

                    <!-- Feedback -->
                    <?php if (session()->getFlashdata('error')): ?>
                        <div class="notification is-danger">
                            <?= session()->getFlashdata('error') ?>
                        </div>
                    <?php endif; ?>

                    <!-- Formulario de Inicio de Sesión -->
                    <div class="box">
                    <form action="<?= base_url('login/autenticar'); ?>" method="post">
                            <div class="field">
                                <label class="label">Correo Electrónico</label>
                                <div class="control">
                                    <input class="input" type="email" name="email" placeholder="tuemail@ejemplo.com" required>
                                </div>
                            </div>

                            <div class="field">
                                <label class="label">Contraseña</label>
                                <div class="control">
                                    <input class="input" type="password" name="password" placeholder="********" required>
                                </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <button class="button is-link is-fullwidth">Iniciar Sesión</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <p>¿No tienes una cuenta? <a href="<?= base_url('#'); ?>">Regístrate aquí</a>.</p>

                </div>
            </div>
        </section>
    </div>

</div>

<script>

    $(document).ready(function(){
        // Al cargar el DOM pongo el foco en el input email
        $('input[name="email"]').focus();
    });


</script>


<?= $this->endSection() ?>