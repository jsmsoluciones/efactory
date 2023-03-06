<?php
include("../models/database.php");

class CategoryController {
    public function getAllCategories()
    {
        $sql = "SELECT * FROM categorias";

        $connection = Connection::connect();
        $categories = $connection->query($sql)->fetch_all(MYSQLI_ASSOC);

        return $categories;
    }

    public function add($nombre)
    {
        $sql = 'INSERT INTO categorias (nombre) value (?)';

        $connection = Connection::connect();
        $stmt = $connection->prepare($sql);
        $stmt->bind_param('s', $nombre);
        $stmt->execute();
    }
}