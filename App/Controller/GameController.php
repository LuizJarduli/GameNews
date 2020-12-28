<?php

namespace App\Controller;
use App\Entity\Game;

class GameController{

    //POST - Cria um novo game
    function create($data = null){
        return json_encode(["name" => "create"]);
    }

    //PUT - Altera um game
    function update($id = 0, $data = null)
    {
        return json_encode(["name" => "update - {$id}"]);
    }

    //GET - Retorna um game pelo ID
    function readById($id = 0)
    {
        return json_encode(["name" => "readById - {$id}"]);
    }

    //DELETE - Deleta uma game pelo ID
    function delete($id = 0)
    {
        return json_encode(["name" => "delete - {$id}"]);
    }

    //GET - Lê todos os registros
    function readAll()
    {
        return json_encode(["name" => "readAll"]);
    }
}