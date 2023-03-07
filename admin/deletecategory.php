<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: /login');
}

include('../controllers/categoryController.php');

$categoryCtrl = new CategoryController();
$categoryCtrl->delete($_GET['id']);
header('location: /admin/categories');
