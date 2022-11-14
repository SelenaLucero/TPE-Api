<?php

class AuthHelper
{


    // public function checkLoggedIn()
    // {

    //     if (!isset($_SESSION['IS_LOGGED'])) {
    //         header('Location: ' . BASE_URL . 'login');
    //         die();
    //     }
    // }

    // public function isLoggedIn()
    // {
    //     session_start();
    //     if (!isset($_SESSION['IS_LOGGED'])) {
    //         return false;
    //     }
    //     return true;
    // }

    function getColumns($params=null){
        $columns = [];
        $result = $this->productModel->getColumns();
        //var_dump($result);
        foreach ($result as $columna) {
            // var_dump($columna->Field);
            array_push($columnas, $columna->Field);
        }
        $this->view->response($columnas, 200);
    }
}
