<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: /login');
}

include('../../partials/head.php');
include('../../partials/header.php');
include('../../models/database.php');
include('../../controllers/categoryController.php');

$connection = new Connection;

$categoryCtrl = new CategoryController($connection);
$category = $categoryCtrl->getOneCategory($_GET['id']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $categoryCtrl->edit($_POST['id'], $_POST['nombre']);
    header('Location: /admin/categories');
}
?>
<br>
<div class="col-md-4 mx-auto">

    <form method="post">
        <div class="mb-3">
            <label for="" class="form-label">Nombre de la categoria</label>
            <input type="text" class="form-control" value="<?= $category['nombre'] ?>" name="nombre">
            <input type="hidden" name="id" value="<?= $category['id'] ?>">
            <button type="submit" class="btn btn-primary mt-5">Enviar</button>
        </div>
    </form>
</div>

<?php include('../../partials/footter.php') ?>