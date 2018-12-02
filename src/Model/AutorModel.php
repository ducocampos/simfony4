<?php

namespace App\Model;

use App\Manager\AutorManager;

class AutorModel
{
    private $autor;
    private $id;
    
    public function __construct()
    {
        $this->manager = new AutorManager();
    }

    public function listarAutores()
    {
        return $this->manager
        ->setTable('autores')
        ->listar()
        ->executar('select');
    }

    public function adicionarAutor()
    {
        return $this->manager
        ->setTable('autores')
        ->setCampo(['autor'])
        ->setValor($this->getAutor())
        ->inserir()
        ->executar('insert');
    }

    public function editarAutor()
    {
        return $this->manager
        ->setTable('autores')
        ->setCampo(['autor'])
        ->setValor([$this->getAutor()])
        ->setWhere($this->getId())
        ->editar()
        ->executar('update');
    }

    public function deletarAutor()
    {
        return $this->manager
        ->setTable('autores')
        ->setCampo(['id'])
        ->setValor([$this->getId()])
        ->deletar()
        ->executar('delete');
    }

    public function getAutor()
    {
        return $this->autor;
    }

    public function setAutor($autor)
    {
        $this->autor = $autor;

        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}