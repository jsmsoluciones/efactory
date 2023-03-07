<?php
// include("./models/database.php");

class ProductController
{
    protected $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    /**
     * Buscar los productos y nombre de la categoria a la cual pertenece
     * 
     * @return array listado de produtos
     */
    public function getAllProducts()
    {
        $sql = "SELECT *, 
        (SELECT nombre FROM categorias WHERE categorias.id = productos.id_categoria limit 1) 
        as categoria FROM productos";

        $connection = $this->connection->connect();
        $products = $connection->query($sql)->fetch_all(MYSQLI_ASSOC);

        return $products;
    }

    /**
     * Busca un producto especifico
     * 
     * @param int $id numero de identificador del producto
     * 
     * @return array producto seleccionado
     */
    // public function getOneProdut($id)
    // {
    //     $product = Connection::getOneData('productos', $id);
    //     return $product;
    // }
}
