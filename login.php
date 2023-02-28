<?php
if (!isset($_SESSION) && $_SERVER['REQUEST_METHOD']== 'POST') {
    session_start();
    header('Location: /admin/ ');
}

include('./partials/head.php');
include('./partials/header.php')
?>
<h3>este es el login</h3>
<?php include('./partials/footter.php') ?>