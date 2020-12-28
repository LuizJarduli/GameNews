<?php

    require_once("../../vendor/autoload.php");

    //HEADER
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: GET,POST,PUT,DELETE");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    //HEADER


    $controller = null; // controller (EX: /game)
    $param = null; // parâmetro (EX: /game/:id)
    $data = null;
    $method = $_SERVER["REQUEST_METHOD"]; //POST, PUT, DELETE and GET
    parse_str(file_get_contents('php://input'), $data);

    $uri = $_SERVER["REQUEST_URI"];
    $unsetCount = 3;

    //Trata a URI
    $ex = explode("/", $uri);
    for($i = 0; $i < $unsetCount; $i++){
        unset($ex[$i]);
    }

    //Filtra os índices do array para apresentar apenas valores válidos
    $ex = array_filter(array_values($ex));

    //faz uma checagem antes de atribuir os valores para controller e id
    if(isset($ex[0])){
        $controller = $ex[0];
        if(isset($ex[1])){
            $param = $ex[1];
        }
    }
    //var_dump($ex);

    echo json_encode(["controller" => $controller,"id" => $param]);



?>