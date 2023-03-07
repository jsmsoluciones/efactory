<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: /login');
}

include('../../partials/head.php');
include('../../partials/header.php');
include('../../models/database.php');
include('../../controllers/productController.php');

$connection = new Connection;

$productCtrl = new ProductController($connection);

?>

<br>

<div class="col-md-6 mx-auto">
    <h3>Crear producto</h3>
    <br>
    <form method="post">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" placeholder="Nombre del producto" required>
        </div>
        <div class="mb-3">
            <label for="foto1" class="form-label">Seleccione imagen</label>
            <input type="file" class="form-control" name="foto1" required>
        </div>
        <div class="mb-3">
            <label for="descripcion_es" class="form-label">Descripción español</label>
            <textarea class="form-control" name="descripcion_es" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="descripcion_en" class="form-label">Descripción ingles</label>
            <textarea class="form-control" name="descripcion_en" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="id_categoria" class="form-label">Categoría</label>
            <select multiple class="form-select form-select-sm" name="id_categoria" required>
                <option value="">Select one</option>
                <option value="">New Delhi</option>
                <option value="">Istanbul</option>
                <option value="">Jakarta</option>
            </select>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
    </form>
</div>

<?php include('../../partials/footter.php') ?>