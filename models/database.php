<?php
class Connection
{
    static public function connect()
    {
        $server = "localhost";
        $database = "efactory";
        $user = "root";
        $password = "";

        // $server = "localhost";
        // $database = "id20345771_efactory";
        // $user = "id20345771_factory";
        // $password = "NN$9h2wLR>kzr3K3";

        $connection = new mysqli($server, $user, $password, $database);

        if ($connection->connect_error) {
            die('Error de conexión: ' . $connection->connect_error);
        };
        return $connection;
    }

    // static public function getAllData($table)
    // {
    //     $sql = "SELECT * FROM $table";
    //     $stmt = Connection::connect()->prepare($sql);
    //     $stmt->execute();
    //     return $stmt->fetchAll(PDO::FETCH_ASSOC);
    // }

    // static public function getOneData($table, $id)
    // {
    //     $sql = "SELECT * FROM $table WHERE id = :id limit 1";
    //     $stmt = Connection::connect()->prepare($sql);
    //     $stmt->execute(array(':id' => $id));
    //     return $stmt->fetchAll(PDO::FETCH_ASSOC);
    // }

    // static public function getCustom($sql)
    // {
    //     $stmt = Connection::connect()->query($sql);
    //     $stmt->execute();
    //     return $stmt->fetchAll(PDO::FETCH_ASSOC);
    // }
}
