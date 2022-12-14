<?php
require_once 'app/Api-models/prod.model.php';
require_once 'app/Api-View/Api-View.php';

class ApiController
{ 
    private $prodmodel;
    private $view;
    private $data;

    public function __construct()
    {
        $this->prodmodel = new ProdModel();
        $this->view = new ApiView();

        // lee el body del request [procesa la entrada de php]
        $this->data = file_get_contents("php://input");
    }

    private function getData()
    {
        return json_decode($this->data);
    }


    public function getProducts($params = null)
    {
        
        try {
            if ((isset($_GET['orderBy'])) && (isset($_GET['sort']))) {
                $orderBy = $_GET['orderBy'];
                $sort = $_GET['sort'];

                $products = $this->prodmodel->getAllOrder($orderBy, $sort);
                $this->view->response($products, 200);
                if ((isset($_GET['orderBy'])==null) && (isset($_GET['sort'])==null)) {
                    $this->view->response("Los parametros son incorrectos", 400);
                }
            }
            else {
                $products = $this->prodmodel->getAll();
                $this->view->response($products, 200);
            }
        } catch (Exception) {
            $this->view->response("Error", 500);
        }
    }
    
    public function getProduct($params = null)
    {
        $id = $params[':ID'];

        $product = $this->prodmodel->getById($id); 

        if (is_numeric($id) && ($id > 1)) { 
            if ($product) {
                $this->view->response($product); 
            } else {
                $this->view->response("El producto con el id= $id no existe", 404); 
            }
        } else {
            $this->view->response("El parametro es incorrecto", 400);
        }
    }

    public function deleteProduct($params = null)
    {
        $id = $params[':ID'];

        $product = $this->prodmodel->getById($id); 
        if (is_numeric($id) && ($id > 1)) {
            if ($product) {
                $this->prodmodel->deleteProductById($id); 
                $this->view->response($product);
            } else {
                $this->view->response("El producto con el id= $id no existe", 404);
            }
        } else {
            $this->view->response("El parametro es incorrecto", 400);
        }
    }


    public function insertProduct($params = null)
    {
        $product = $this->getData();

        if (empty($product->id_Marca) || empty($product->Variedad) || empty($product->Descripcion) || empty($product->Precio)) {
            $this->view->response("Complete los datos", 400);
        } else {
            $id = $this->prodmodel->insertProd($product->id_Marca, $product->Variedad, $product->Descripcion, $product->Precio);
            $product = $this->prodmodel->getById($id);
            $this->view->response($product, 201); 
        }
    }


    public function updateProduct($params = null)
    {
        $id = $params[':ID'];
        $product = $this->getData();

        $product = $this->prodmodel->getById($id);
        if ($product) {
            $body = $this->getData();
            $id_Marca = $body->id_Marca;
            $Variedad = $body->Variedad;
            $Descripcion = $body->Descripcion;
            $Precio = $body->Precio;
            $product = $this->prodmodel->updateProduct($id_Marca, $Variedad, $Descripcion, $Precio, $id);
            $this->view->response("La tarea fue modificada con exito", 200);
        } else
            $this->view->response("not found", 404);
    }
}
