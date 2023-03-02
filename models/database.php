<?php
class Connection
{
    static public function connect()
    {
        $server = "localhost";
        $database = "efactory";
        $user = "root";
        $password = "";
        try {
            $connection = new PDO("mysql:host=$server;dbname=$database", $user, $password);
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
        return $connection;
    }

    static public function getAllData($table)
    {
        $sql = "SELECT * FROM $table";
        $stmt = Connection::connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    static public function getOneData($table, $id){
        $sql = "SELECT * FROM $table WHERE id = :id limit 1";
        $stmt = Connection::connect()->prepare($sql);
        $stmt->execute(array(':id' => $id));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    static public function getCustom($sql){
        $stmt = Connection::connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
