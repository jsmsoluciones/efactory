<?php
include('./models/database.php');
include './controllers/productController.php';

$connection = new Connection;

$productsCtrl = new ProductController($connection);
$products = $productsCtrl->getAllProducts();

include('./partials/encabezado.php');
?>
<br>
<div class="container">
    <div class="row mb-2">
        <?php if (empty($products)) { ?>
            <h2>Página en construcción</h2>
            <?php  } else {
            foreach ($products as $p) { ?>
                <div class="col-md-6">
                    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative" style="height: 200px;">
                        <div class="col p-4 d-flex flex-column position-static">
                            <a href="#"><strong class="d-inline-block mb-2 text-primary"><?php echo $p['categoria'] ?></strong></a>
                            <h3 class="mb-0"><?php echo $p['nombre'] ?></h3>
                            <p class="card-text mb-auto">
                                <?php if (isset($_COOKIE['lang'])) {
                                    $lang = $_COOKIE['lang'];
                                    if ($lang == "es") {
                                        echo $p['descripcion_es'];
                                    } else {
                                        echo $p['descripcion_en'];
                                    }
                                }
                                ?>
                            </p>
                            <a href="#" class="btn">
                                <?php if (isset($_COOKIE['lang'])) {
                                    $lang = $_COOKIE['lang'];
                                    if ($lang == "es") {
                                        echo "Ver más...";
                                    } else {
                                        echo "more...";
                                    }
                                }
                                ?>
                            </a>
                        </div>
                        <div class="col-auto d-none d-lg-block">
                            <img src="<?php echo '/uploads/' . $p['foto1'] ?>" class="rounded mx-auto d-block" alt="<?php echo $p['nombre'] ?>" loading="lazy" style="width: 100px; height: 80%; ">

                        </div>
                    </div>
                </div>

        <?php }
        } ?>
    </div>
</div>

<?php include('./partials/footter.php') ?>