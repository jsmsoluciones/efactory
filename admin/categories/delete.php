<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: /login');
}

include('../../models/database.php');
include('../../controllers/categoryController.php');

$connection = new Connection;

$categoryCtrl = new CategoryController($connection);
$categoryCtrl->delete($_GET['id']);
header('location: /admin/categories');
