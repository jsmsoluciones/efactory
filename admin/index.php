<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: /login');
}

include('../partials/head.php');
include('../partials/header.php');
include('../controllers/userController.php');

$user = $_SESSION['usuario'];

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    setcookie('password', '', time() - 1);
    $userCtrl = new UserController();
    $userCtrl->changePassword($_POST['password']);
    header('Location: /admin');
}
?>

<main class="container">
    <?php if (isset($_COOKIE['password'])) { ?>

        <div class='alert alert-danger' role='alert'>
            Necesitas realizar un cambio de contraseña, da click a este botón
            <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal'>
                Cambiar contraseña</button>
        </div>

    <?php } ?>
    <div class="p-5 mb-4 bg-light rounded-3">
        <div class="container-fluid py-5">
          <h1 class="display-5 fw-bold">Bienvenido</h1>
          <p class="col-md-8 fs-4">hola, <b><?= $user ?></b> Esta es la sección administrativa de <b>Efactory coffe</b></p>
        </div>
      </div>
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