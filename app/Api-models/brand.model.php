<?php

class brandModel
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

    function getAllBrands()
    {


        $query = $this->db->prepare("SELECT * FROM marca");
        $query->execute();


        $brands = $query->fetchAll(PDO::FETCH_OBJ);

        return $brands;
    }

    function getBrand($id)
    {


        $query = $this->db->prepare("SELECT * FROM marca WHERE id_Marca = ?");
        $query->execute([$id]);


        $brand = $query->fetch(PDO::FETCH_OBJ);

        return $brand;
    }

    function insertBrand($Marca)
    {

        $query = $this->db->prepare("INSERT INTO `marca` ( `Marca`) VALUES (?)");
        $query->execute([$Marca]);


        return $this->db->lastInsertId();
    }

    function deleteBrandtById($id)
    {

        $query = $this->db->prepare('DELETE FROM `marca` WHERE id_Marca = ?');
        $query->execute([$id]);
    }


    function updateBrand($Marca, $id)
    {

        $query = $this->db->prepare('UPDATE `marca` SET `Marca`= ? WHERE id_Marca = ?');
        $query->execute([$Marca, $id]);
    }
}
