- Con este endpoint se ven todos los productos en general:
El endpoint de la API es: http://localhost/WEB2/TPE-Api/api/products

- Con este endpoint se ve un producto en especifico:
El endpoint de la API es: http://localhost/WEB2/TPE-Api/api/products/:ID 
EJEMPLO: http://localhost/WEB2/TPE-Api/api/products/205

- Con este endpoint se puede eliminar un producto en especifico:
El endpoint de la API es: http://localhost/WEB2/TPE-Api/api/products/:ID 
EJEMPLO: http://localhost/WEB2/TPE-Api/api/products/205

- Con este endpoint se puede insertar un producto en especifico:
El endpoint de la API es: http://localhost/WEB2/TPE-Api/api/products
EJEMPLO:  esto se insertaria en el body
{
    "id_Marca": "52",
    "Variedad": "blanco",
    "Descripcion": "producto NUEVO ",
    "Precio": "2000",
    "Marca": "Santa Julia"
}

- Con este endpoint se puede editar un producto en especifico:
El endpoint de la API es: http://localhost/WEB2/TPE-Api/api/products/:ID 
EJEMPLO:  esto se insertaria en el body
{
    "id": "207",
    "id_Marca": "52",
    "Variedad": "producto editado",
    "Descripcion": "Un blend de un rojo intenso con aromas a frutos rojos maduros y especias. Posee taninos maduros que dan una sensación de redondez y una amplitud y final perdurables",
    "Precio": "2000",
    "Marca": "Santa Julia"
}

- Con este endpoint se ven todos los productos con el precio ordenado segun el parametro:
El endpoint de la API es: http://localhost/WEB2/TPE-Api/api/products/orderBy/:order

EJEMPLO: 
El endpoint de la API es: http://localhost/WEB2/TPE-Api/api/products/orderBy/DESC
El endpoint de la API es: http://localhost/WEB2/TPE-Api/api/products/orderBy/ASC

- Con este endpoint se ven todos los productos con el precio ordenado segun el parametro:
El endpoint de la API es: http://localhost/WEB2/TPE-Api/api/products/filter/:variedad

EJEMPLO: 
El endpoint de la API es: http://localhost/WEB2/TPE-Api/api/products/filter/blanco
El endpoint de la API es: http://localhost/WEB2/TPE-Api/api/products/filter/tinto
El endpoint de la API es: http://localhost/WEB2/TPE-Api/api/products/filter/rosado





