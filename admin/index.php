<?php
if (!isset($_SESSION)) {
    header('Location: /login');
}

include('./partials/head.php');
include('./partials/header.php')
?>
<h1>este es el index de usuario logueado</h1>
<?php include('./partials/footter.php') ?>