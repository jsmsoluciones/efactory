<?php
if (!isset($_COOKIE['lang'])) {
    $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
    setcookie('lang', $lang, time() + 3600 * 365);
}
include('./partials/head.php');
include('./partials/header.php');
