<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: /login');
}

include('../partials/head.php');
include('../partials/header.php')
?>

<main class="container">
    <?php if (isset($_COOKIE['flash'])) { ?>

        <div class='alert alert-danger' role='alert'>
            Necesitas realizar un cambio de contraseña, da click a este botón
            <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal'>
                Lanzar demo de modal</button>
        </div>

    <?php } ?>
    <h1>este es el index de usuario logueado</h1>
</main>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cambio de contraseña</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" name="password" placeholder="Contraseña" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include('../partials/footter.php') ?>