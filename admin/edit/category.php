<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: /login');
}

include('../../partials/head.php');
include('../../partials/header.php');
include('../../controllers/categoryController.php');

$categoryCtrl = new CategoryController();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   
}
?>
<form method="post">
    <div class="mb-3">
      <label for="" class="form-label">Nombre de la categoria</label>
      <input type="text"
        class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
    </div>
</form>