<?php
class CategoryController
{

    protected $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function getAllCategories()
    {
        $sql = "SELECT * FROM categorias";

        $connection = $this->connection->connect();
        $categories = $connection->query($sql)->fetch_all(MYSQLI_ASSOC);

        return $categories;
    }

    public function getOneCategory($id)
    {
        $sql = "SELECT * FROM categorias WHERE id = $id";

        $connection = $this->connection->connect();
        $category = $connection->query($sql)->fetch_assoc();

        return $category;
    }

    public function add($nombre)
    {
        $sql = 'INSERT INTO categorias (nombre) value (?)';

        $connection = $this->connection->connect();
        $stmt = $connection->prepare($sql);
        $stmt->bind_param('s', $nombre);
        $stmt->execute();
    }

    public function edit($id, $nombre)
    {
        $sql = 'UPDATE categorias SET nombre = ? WHERE id = ?';
        $connection = $this->connection->connect();
        $stmt = $connection->prepare($sql);
        $stmt->bind_param('ss', $nombre, $id);
        $stmt->execute();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM categorias WHERE id = ?";

        $connection = $this->connection->connect();
        $stmt = $connection->prepare($sql);
        $stmt->bind_param('s', $id);
        $stmt->execute();
    }
}
