<?php
require_once './libs/Router.php';
require_once 'app/Controller/Api-Controller.php';


// crea el router
$router = new Router();

// defina la tabla de ruteo

$router->addRoute('products', 'GET', 'ApiController', 'getProducts');
$router->addRoute('products/:ID', 'GET', 'ApiController', 'getProduct');
$router->addRoute('products/:ID', 'DELETE', 'ApiController', 'deleteProduct');
$router->addRoute('products', 'POST', 'ApiController', 'insertProduct'); 
$router->addRoute('products/:ID', 'PUT', 'ApiController', 'updateProduct'); 



// ejecuta la ruta (sea cual sea)
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
