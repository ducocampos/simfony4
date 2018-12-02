<?php

namespace App\Model;

use App\Manager\EditoraManager;

class EditoraModel
{
    private $editora;
    private $id;
    
    public function __construct()
    {
        $this->manager = new EditoraManager();
    }

    public function listarEditoras()
    {
        return $this->manager
        ->setTable('editoras')
        ->listar()
        ->executar('select');
    }

    public function adicionarEditora()
    {
        return $this->manager
        ->setTable('editoras')
        ->setCampo(['editora'])
        ->setValor($this->getEditora())
        ->inserir()
        ->executar('insert');
    }

    public function editarEditora()
    {
        return $this->manager
        ->setTable('editoras')
        ->setCampo(['editora'])
        ->setValor([$this->getEditora()])
        ->setWhere($this->getId())
        ->editar()
        ->executar('update');
    }

    public function deletarEditora()
    {
        return $this->manager
        ->setTable('editoras')
        ->setCampo(['id'])
        ->setValor([$this->getId()])
        ->deletar()
        ->executar('delete');
    }

    public function getEditora()
    {
        return $this->editora;
    }

    public function setEditora($editora)
    {
        $this->editora = $editora;

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