<?php

namespace App\Controller;
use App\Entity\Game;

class GameController{

    //POST - Cria um novo game
    function create($data = null){
        $game = $this->convertType($data);
        //print_r($game);
        $result = $this->validate($game);
        if($result != ""){
            echo json_encode(["result" => $result]);
        }
    }

    //PUT - Altera um game
    function update($id = 0, $data = null)
    {
        $game = $this->convertType($data);
        $game->setId($id);
        $result = $this->validate($game, true);
        if ($result != "") {
            echo json_encode(["result" => $result]);
        }
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

    private function validate(Game $game, $update = false){
        
        if($update && $game->getId() <= 0){
            return "invalid id";
        }
        if (strlen($game->getTitulo()) < 3 || strlen($game->getTitulo()) > 100 ) {
            return  "invalid titulo";
        }
        if (strlen($game->getDescricao()) < 10 || strlen($game->getDescricao()) > 250) {
            return "invalid descricao";
        }
        if ($game->getVideoid() == "" || strlen($game->getVideoid()) > 15) {
            return "invalid videoid";
        }
        return "";
    }
}