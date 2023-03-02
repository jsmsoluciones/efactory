<?php
include("./models/database.php");

class ProductController
{
    public function getAllProducts()
    {
        $sql = "SELECT *, (SELECT nombre FROM categorias WHERE categorias.id = productos.id_categoria limit 1) as categoria  FROM productos";

        $products = Connection::getCustom($sql);
        return $products;
    }

    public function getOneProdut($id)
    {
        $product = Connection::getOneData('productos', $id);
        return $product;
    }
}
