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
$products = array();

$products = $productCtrl->getAllProducts();
?>
<br>
<div class="container">
    <div style="display: flex; align-items: center; justify-content: space-between;">
        <h4 class="card-title">Productos</h4>
        <a class="btn" href="/admin/products/create" style="background-color: var(--background-color); color:white">Añadir</a>
    </div>
    <hr>
    <?php if (empty($products)) { ?>
        <h3>Añade productos a la base de datos</h3>
    <?php } else { ?>
        <div class="table-responsive">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Descripción español</th>
                        <th scope="col">Description ingles</th>
                        <th scope="col">Categoría</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($products as $p) { ?>
                        <tr class="">
                            <td scope="row"><?= $p['id'] ?></td>
                            <td><?= $p['nombre'] ?></td>
                            <td>
                                <img src="<?php echo '/uploads/' . $p['foto1'] ?>" class="rounded mx-auto d-block" alt="<?php echo $p['nombre'] ?>" loading="lazy" style="width: 30px;">
                            </td>
                            <td><?= $p['descripcion_es'] ?></td>
                            <td><?= $p['descripcion_en'] ?></td>
                            <td><?= $p['categoria'] ?></td>
                            <td>
                                <a class="btn btn-primary" href="/admin/editcategory?id=<?= $p['id'] ?>" role="button">Editar</a>
                                <a class="btn btn-danger" href="/admin/deletecategory?id=<?= $p['id'] ?>">Eliminar</a>

                            </td>
                        </tr>
                    <?php } ?>


                </tbody>
            </table>
        </div>
    <?php } ?>

</div>
<?php include('../../partials/footter.php') ?>