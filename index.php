    <?php 
    include('./partials/encabezado.php');

    if (isset($_COOKIE['lang'])) {
        $lang = $_COOKIE['lang'];
        include "./lang/" . $lang . ".php";
    } else {
        include "./lang/es.php";
    }


    include('./partials/footter.php') ?>