<?php
class ApiView
{

    //le pasamos la data (obj-json) y un status
    public function response($data, $status = 200)
    {
        header("Content-Type: application/json"); //settea el header con resultado de la operacion
        header("HTTP/1.1 " . $status . " " . $this->_requestStatus($status)); //el status y l valor de ese status

        // convierte los datos a un formato json
        echo json_encode($data);
    }

    private function _requestStatus($code)
    {
        $status = array(
            200 => "OK",
            201 => "Created",
            400 => "Bad request",
            404 => "Not found",
            500 => "Internal Server Error"
        );
        return (isset($status[$code])) ? $status[$code] : $status[500];
    }
}
