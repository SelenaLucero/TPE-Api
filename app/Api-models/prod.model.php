<?php

class ProdModel
{
    private $db;


    function __construct()
    {
        $this->db = $this->getDB();
    }


    private function getDB()
    {
        $db = new PDO('mysql:host=localhost;' . 'dbname=db_vinoteca;charset=utf8', 'root', '');
        return $db;
    }




    function getAll()
    {
        $query = "SELECT producto.* , marca.Marca FROM producto JOIN marca 
        ON producto.id_Marca = marca.id_Marca";

        $queryDB = $this->db->prepare($query); //
        $queryDB->execute();
        $products = $queryDB->fetchAll(PDO::FETCH_OBJ);
        return $products;

    }
    function getAllOrder($orderBy, $sort)
    {

        $query = "SELECT producto.* , marca.Marca FROM producto JOIN marca 
        ON producto.id_Marca = marca.id_Marca ORDER BY $orderBy $sort";
        $queryDB = $this->db->prepare($query); 
        $queryDB->execute();
        $products = $queryDB->fetchAll(PDO::FETCH_OBJ);
        return $products;
    }
   
    function getById($id)
    {

        $query = $this->db->prepare("SELECT producto.* , marca.Marca FROM producto JOIN marca 
                                    ON producto.id_Marca = marca.id_Marca WHERE producto.id = ?");
        $query->execute([$id]);

        $product = $query->fetch(PDO::FETCH_OBJ);

        return $product;
    }



    function insertProd($id_Marca, $Variedad, $Descripcion, $Precio)
    {

        $query = $this->db->prepare("INSERT INTO `producto` (`id_Marca`,`Variedad`, `Descripcion`, `Precio`) VALUES (?,?, ?,?)"); //(preparo)-escribo mi consulta
        $query->execute([$id_Marca, $Variedad, $Descripcion, $Precio]);

        return $this->db->lastInsertId();
    }



    function deleteProductById($id)
    {
        $query = $this->db->prepare('DELETE FROM `producto` WHERE id = ?');
        $query->execute([$id]);
    }

    function updateProduct($id_Marca, $Variedad, $Descripcion, $Precio, $id)
    {
        $query = $this->db->prepare('UPDATE producto SET id_Marca=?, Variedad =?, Descripcion=? , Precio = ? WHERE id = ?');
        $query->execute([$id_Marca, $Variedad, $Descripcion, $Precio, $id]);
    }
}
