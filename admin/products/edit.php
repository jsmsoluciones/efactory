<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: /login');
}

include('../../partials/head.php');
include('../../partials/header.php');
include('../../models/database.php');
include('../../controllers/productController.php');
include('../../controllers/categoryController.php');
include('../../controllers/imageController.php');

$connection = new Connection;

$productCtrl = new ProductController($connection);
$product = $productCtrl->getOne($_GET['id']);

$categoryCtrl = new CategoryController($connection);
$categories = $categoryCtrl->getAllCategories();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_FILES['imagen']['name'] != '') {
        $imageCtrl = new ImageController;
        $imageCtrl->delete($product['foto1']);
        $foto1 = $imageCtrl->upload($_FILES['imagen']);

        $productCtrl->editFull($_POST['nombre'], $_POST['descripcion_es'], $_POST['descripcion_en'], $_POST['id_categoria'], $_POST['link'], $foto1, $_POST['id']);

    } else {
        $productCtrl->edit($_POST['nombre'], $_POST['descripcion_es'], $_POST['descripcion_en'], $_POST['id_categoria'], $_POST['link'], $_POST['id']);
    }
    setcookie('toast', 'Producto editado satisfactoriamente', time() + 20);
    header('location: /admin/products');
}

?>

<br>
<div class="col-md-8 mx-auto container">
    <h3>Editar producto</h3>
    <br>
    <form method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-6">
                <input type="hidden" name="id" class="form-control"  value="<?= $product['id'] ?>" required>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" name="nombre" class="form-control" placeholder="Nombre del producto" value="<?= $product['nombre'] ?>" required>
                </div>
            </div>
            <div class="col-6">

                <div class="mb-3">
                    <label for="imagen" class="form-label">Seleccione imagen</label>
                    <input type="file" class="form-control" name="imagen">
                    <div class="form-text text-danger">Solo cuando va a cambia la imagen</div>
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="descripcion_es" class="form-label">Descripción español</label>
            <textarea class="form-control" name="descripcion_es" rows="3" required>
            <?= $product['descripcion_es'] ?>
            </textarea>
        </div>
        <div class="mb-3">
            <label for="descripcion_en" class="form-label">Descripción ingles</label>
            <textarea class="form-control" name="descripcion_en" rows="3" required>
            <?= $product['descripcion_en'] ?>
            </textarea>
        </div>
        <div class="mb-3">
            <label for="id_categoria" class="form-label">Categoría</label>
            <select class="form-select form-select-sm" name="id_categoria" required>
                <?php foreach ($categories as $c) { ?>
                    <option value='<?= $c['id']  ?>' <?php if ($c['id'] == $product['id_categoria']) {
                                                            echo 'selected';
                                                        } ?>>
                        <?= $c['nombre']  ?>
                    </option>
                <?php } ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="link" class="form-label">Link</label>
            <input type="text" name="link" class="form-control" placeholder="Link de amazon" value="<?= $product['link'] ?>" required>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
    </form>
</div>

<?php include('../../partials/footter.php') ?>