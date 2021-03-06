<?php
    namespace App\Model;
    use App\Entity\Game;
    use App\Util\Serialize;

    class GameModel{
        private $fileName;
        private $listGame = []; // Object type game
        
        public function __construct()
        {
            $this->fileName = "../database/gamenews.db";
            $this->load();
        }

        public function readAll(){
            return (new Serialize())->serialize($this->listGame);
        }

        public function readById($id){
            foreach ($this->listGame as $g) {
                if ($g->getId() == $id) {
                    return (new Serialize())->serialize($g);
                }
            }
            return [];
        }

        public function create(Game $game)
        {
            $game->setId($this->getLastId());
            $this->listGame[] = $game;
            $this->save();
            return "ok";
        }

        private function save()
        {
            $temp = [];

            foreach ($this->listGame as $g) {
                $temp[] = [
                    "id" => $g->getId(),
                    "titulo" => $g->getTitulo(),
                    "descricao" => $g->getDescricao(),
                    "videoid" => $g->getVideoid()
                ];

                $string = json_encode($temp);
                
                $fp = fopen($this->fileName,"w");
                fwrite($fp, json_encode($temp));
                fclose($fp);
            }
        }

        //Internal Method
        private function getLastId(){
            $lastId = 0;
            foreach ($this->listGame as $g) {
                if ($g->getId() > $lastId) {
                    $lastId = $g->getId();
                }
            }
            return ($lastId + 1);
        }
        
        private function load()
        {
            if(!file_exists($this->fileName) || filesize($this->fileName) <= 0){
                return [];
            }

            $str = "";

            $fp = fopen($this->fileName,"r");
            $str = fread($fp,filesize($this->fileName));
            fclose($fp);
            $arrayGame = json_decode($str);

            foreach ($arrayGame as $g) {
                $this->listGame[] = new Game(
                    $g->id,
                    $g->titulo,
                    $g->descricao,
                    $g->videoid  
                );
            }
        }

    }
?>