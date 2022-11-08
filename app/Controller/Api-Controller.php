<?php
require_once 'app/Api-models/prod.model.php';
require_once 'app/Api-View/Api-View.php';

class ApiController
{ //esta mal este nombre?
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
        try{
            $array = [];
            if(isset($_GET['orderBy'])){
                $array['orderBy'] = $_GET['orderBy']; 
            
                if(isset($_GET['sort'])){
                    $array['sort'] = $_GET['sort'];
                }  
       
                else if(isset($_GET['filter'])){
                    $filter= $_GET['filter'];
              
                }   
            }   
        var_dump($array);
        $products = $this->prodmodel->getAll($array, $filter);
        $this->view->response($products, 200);
             
        }catch(Exception){
            $this->view->response("hubo un error", 400);
        }
    }
       

    public function getProduct($params = null)
    {
        $id = $params[':ID'];
        $product = $this->prodmodel->getById($id); //esta bien que sea getbyid?


        if ($product) { //response es la funcion que obtiene el json mas el status
            $this->view->response($product);
        } else { // si no existe devuelvo 404
            $this->view->response("El producto con el id= $id no existe", 404);
        }
    }

    public function deleteProduct($params = null)
    {
        $id = $params[':ID'];

        $product = $this->prodmodel->getById($id); // obtengo el producto segun su id

        if ($product) {
            $this->prodmodel->deleteProductById($id); //borro el producto segun su id 

            $this->view->response($product);
        } else
            $this->view->response("El producto con el id= $id no existe", 404);
    }


    public function insertProduct($params = null)
    {
        $product = $this->getData();

        if (empty($product->id_Marca) || empty($product->Variedad) || empty($product->Descripcion) || empty($product->Precio)) {
            $this->view->response("Complete los datos", 400);
        } else {
            $id = $this->prodmodel->insertProd($product->id_Marca, $product->Variedad, $product->Descripcion, $product->Precio);
            $product = $this->prodmodel->getById($id);
            $this->view->response($product, 201); //inserta el producto con exito!
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
