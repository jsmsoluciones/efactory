<?php
include("./models/database.php");

class LoginController
{
    /**
     * Buscar usuario en la base de datos
     * @param string $email Email ingresado por el usuario
     * @param string $password Contraseña ingresada por el usuario
     * 
     * @return bool si usuario existe o si la contraseña concuerda
     */
    public function getUser($email, $password)
    {
        $sql = "SELECT * FROM usuario WHERE email = '$email'";
        $user = Connection::getCustom($sql);

        if (empty($user)) {
            return false;
        } else {
            $pass = $user[0]['password'];
            if ($pass == 'admin' && $password == 'admin') {
                return true;
            } else if (password_verify($password, $pass)) {
                return true;
            } else {
                return false;
            }
        }
    }
}
