***URl***: http://localhost/WEB2/TPE-Api/api/products

**Parametros**: 

**orderBy**: Con este podras especificar que campo queres ordenar 

**sort**: Es la forma en la que sera ordenado ya sea ASC o DESC

Los metodos que se podran utilizar en esta API son los siguientes: 

**GET,POST,PUT,DELETE**; 

Ejemplos: 

metodo GET este podra accederse con un id: mediante el cual podra acceder a ese solo producto, ejemplo id = 205. 
En caso de querer traer todos los productos no es necesario pasarle un id. 
{
    "id": "205",
    "id_Marca": "52",
    "Variedad": "rosado",
    "Descripcion": "Un blend de un rojo intenso con aromas a frutos rojos maduros y especias. Posee taninos maduros que dan una sensación de redondez y una amplitud y final perdurables.",
    "Precio": "2000",
    "Marca": "Santa Julia"
>}

Metodo POST para poder inserta un nuevo elemento este debera ser en formato JSON con toda la informacion correspondiente (sin el id).

>{
    "id_Marca": "52",
    "Variedad": "rosado",
    "Descripcion": "Nuevo producto",
    "Precio": "1500",
    "Marca": "Santa Julia"
>}

Metodo PUT con este metodo podra editar el producto,debera informa su id, luego podra copiar el JSON que quiera editar y por ultimo realizar las modificaciones. 
>{
    "id": "205",
    "id_Marca": "52",
    "Variedad": "rosado",
    "Descripcion": "PRODUCTO EDITADO",
    "Precio": "2000",
    "Marca": "Santa Julia"
>}
Metodo DELETE con este podra borrar el elemento que quiera, al borrarlo debera especificar el id

http://localhost/WEB2/TPE-Api/api/products/211

RESPUESTAS Y ERRORES 
Las respuestas pueden ser:

    200 => "OK",
    201 => "Created",
    400 => "Bad request",
    404 => "Not found",
    500 => "Internal Server Error"
