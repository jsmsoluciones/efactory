<?php
include("../models/database.php");

class CategoryController extends Connection{
    public function getAllCategories()
    {
        $sql = "SELECT * FROM categorias";

        $connection = Connection::connect();
        $categories = $connection->query($sql)->fetch_all(MYSQLI_ASSOC);

        return $categories;
    }

    public function getOneCategory($id)
    {
        $sql = "SELECT * FROM categorias WHERE id = $id";

        $connection = Connection::connect();
        $category = $connection->query($sql)->fetch_assoc();

        return $category;
    }

    public function add($nombre)
    {
        $sql = 'INSERT INTO categorias (nombre) value (?)';

        $connection = Connection::connect();
        $stmt = $connection->prepare($sql);
        $stmt->bind_param('s', $nombre);
        $stmt->execute();
    }

    public function edit($id, $nombre){
        $sql = 'UPDATE categorias SET nombre = ? WHERE id = ?';
        $connection = Connection::connect();
        $stmt = $connection->prepare($sql);
        $stmt->bind_param('ss', $nombre, $id);
        $stmt->execute();
    }
}