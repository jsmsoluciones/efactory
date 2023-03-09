<?php
// include("./models/database.php");

class ProductController
{
    protected $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function getAllProducts()
    {
        $sql = "SELECT *, 
        (SELECT nombre FROM categorias WHERE categorias.id = productos.id_categoria limit 1) 
        as categoria FROM productos";

        $connection = $this->connection->connect();
        $products = $connection->query($sql)->fetch_all(MYSQLI_ASSOC);

        return $products;
    }

    public function getOne($id)
    {
        $sql = "SELECT *, 
        (SELECT nombre FROM categorias WHERE categorias.id = productos.id_categoria limit 1) 
        as categoria FROM productos WHERE id = $id";

        $connection = $this->connection->connect();
        $product = $connection->query($sql)->fetch_assoc();

        return $product;
    }

    public function create($nombre, $descipcion_es, $descipcion_en, $id_categoria, $link, $foto)
    {
        $sql = "INSERT INTO productos (nombre, foto1, descripcion_es, descripcion_en, id_categoria, link) VALUE (?,?,?,?,?,?)";

        $connection = $this->connection->connect();
        $stmt = $connection->prepare($sql);
        $stmt->bind_param('ssssis', $nombre, $foto, $descipcion_es, $descipcion_en, $id_categoria, $link);
        $stmt->execute();
    }
}
