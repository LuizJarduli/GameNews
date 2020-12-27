<?php

namespace App\Entity;

class Game{
    
    private $id;
    private $titulo;
    private $descricao;
    private $videoid;

    //Construtor
    public function __construct($id = '', $titulo = '',$descricao='',$videoid='')
    {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->descricao = $descricao;
        $this->videoid = $videoid;
    }


    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Set the value of titulo
     *
     * @return  self
     */ 
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Set the value of descricao
     *
     * @return  self
     */ 
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }

    /**
     * Set the value of videoid
     *
     * @return  self
     */ 
    public function setVideoid($videoid)
    {
        $this->videoid = $videoid;

        return $this;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of titulo
     */ 
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Get the value of descricao
     */ 
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Get the value of videoid
     */ 
    public function getVideoid()
    {
        return $this->videoid;
    }
}