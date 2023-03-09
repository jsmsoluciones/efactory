<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: /login');
}

include('../../models/database.php');
include('../../controllers/productController.php');
include('../../controllers/imageController.php');

$connection = new Connection;

$productCtrl = new ProductController($connection);
$product = $productCtrl->getOne($_GET['id']);
$productCtrl->delete($_GET['id']);

$imageCtrl = new ImageController;
$imageCtrl->delete($product['foto1']);

header('location: /admin/products');
