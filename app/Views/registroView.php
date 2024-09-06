<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>

<div class="columns">

<div class="column is-narrow">
    <aside class="menu">
            <a href="<?= base_url('/'); ?>">
                    <figure class="image is-128x128">
                        <img src="/scgo_favicon.png" alt="Logo">
                    </figure>
            </a>
    </aside>
</div>


    <div class="column is-8 is-offset-1">
        <h1 class="title has-text-centered">Registro de Usuario</h1>

        <!-- Feedback del Registro -->
        <?php if (session()->get('errors')): ?>
            <div class="notification is-danger">
                <ul>
                <?php foreach (session()->get('errors') as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach ?>
                </ul>
            </div>
        <?php endif; ?>

        <?php if (session()->get('success')): ?>
            <div class="notification is-success">
                <?= session()->get('success') ?>
            </div>
        <?php endif; ?>

        <!-- Formulario de Registro -->
        <div class="box">
            <form action="<?= base_url('registro/registrar'); ?>" method="post">
                <div class="field">
                    <label class="label">Correo Electrónico</label>
                    <div class="control">
                        <input class="input" type="email" name="emailUsuario" placeholder="tuemail@ejemplo.com" value="<?= old('emailUsuario') ?>" required>
                    </div>
                </div>

                <div class="field">
                    <label class="label">Contraseña</label>
                    <div class="control">
                        <input class="input" type="password" name="pwUsuario" placeholder="********" required>
                    </div>
                </div>

                <div class="field">
                    <label class="label">Repetir contraseña</label>
                    <div class="control">
                        <input class="input" type="password" name="confirmPwUsuario" placeholder="********" required>
                    </div>
                </div>

                <div class="columns">
                    <div class="column">
                        <div class="field">
                            <label class="label">DNI</label>
                            <div class="control">
                                <input class="input" type="text" name="dniUsuario" placeholder="DNI" value="<?= old('dniUsuario') ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="column">
                        <div class="field">
                            <label class="label">Nombre</label>
                            <div class="control">
                                <input class="input" type="text" name="nombreUsuario" placeholder="Nombre" value="<?= old('nombreUsuario') ?>" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="columns">
                    <div class="column">
                        <div class="field">
                            <label class="label">Apellido</label>
                            <div class="control">
                                <input class="input" type="text" name="apellidoUsuario" placeholder="Apellido" value="<?= old('apellidoUsuario') ?>" required>
                            </div>
                        </div>
                    </div>

                    <div class="column">
                        <div class="field">
                            <label class="label">Fecha de Nacimiento</label>
                            <div class="control">
                                <input class="input" type="date" name="fechaNacimiento" value="<?= old('fechaNacimiento') ?>" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="field">
                    <label class="label">Tipo de permiso</label>
                    <div class="control">
                        <div class="select is-fullwidth">
                            <select name="permisoConducirUsuario" required>
                                <option value="" disabled selected>Selecciona tu tipo de permiso</option>
                                <option value="A" <?= old('permisoConducirUsuario') == 'A' ? 'selected' : '' ?>>A</option>
                                <option value="A2" <?= old('permisoConducirUsuario') == 'A2' ? 'selected' : '' ?>>A2</option>
                                <option value="A1" <?= old('permisoConducirUsuario') == 'A1' ? 'selected' : '' ?>>A1</option>
                                <option value="B" <?= old('permisoConducirUsuario') == 'B' ? 'selected' : '' ?>>B</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="columns">
                    <div class="column">
                        <div class="field">
                            <label class="label">Fecha de Obtención del Permiso</label>
                            <div class="control">
                                <input class="input" type="date" name="obtencionPermisoUsuario" value="<?= old('obtencionPermisoUsuario') ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="column">
                        <div class="field">
                            <label class="label">Fecha de Caducidad del Permiso</label>
                            <div class="control">
                                <input class="input" type="date" name="caducidadPermisoUsuario" value="<?= old('caducidadPermisoUsuario') ?>" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="field">
                    <div class="control">
                        <button class="button is-primary is-fullwidth">Registrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<script>



</script>

<style>
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
