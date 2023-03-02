<?php
include("./models/database.php");

class UserController{
    public function changePassword($newPassword) {
        $hash = password_hash($newPassword, PASSWORD_DEFAULT);
        $email = $_SESSION['usuario'];
        $sql = "UPDATE usuario SET password = $hash WHERE email = $email";
        $result = Connection::getCustom($sql);
        print_r($result);
    }
}