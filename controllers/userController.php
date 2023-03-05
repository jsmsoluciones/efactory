<?php
include("../models/database.php");

class UserController{
    /**
     * Cambia la contraseña de un usuario
     * 
     * @param string $newPassword nueva contraseña
     * 
     */
    public function changePassword($newPassword) {
        $hash = password_hash($newPassword, PASSWORD_DEFAULT);
        $email = $_SESSION['usuario'];
        $sql = "UPDATE usuario SET password = $hash WHERE email = $email";
        $result = Connection::getCustom($sql);
    }
}