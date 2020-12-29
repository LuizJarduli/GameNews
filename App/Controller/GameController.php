<?php

namespace App\Controller;
use App\Entity\Game;

class GameController{

    //POST - Cria um novo game
    function create($data = null){
        $game = $this->convertType($data);
        //print_r($game);
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

    private function convertType($data){
        return new Game(
            null,
            (isset($data['titulo']) ? $data['titulo'] : null),
            (isset($data['descricao']) ? $data['descricao'] : null),
            (isset($data['videoid']) ? $data['videoid'] : null)
        );
    }
}