<?php
$server = "localhost";
$database = "efactory";
$user = "root";
$password = "";

try{
    $connection = new PDO("mysql:host=$server;dbname=$database", $user, $password);
}catch (Exception $ex) {  
    echo $ex->getMessage();
}