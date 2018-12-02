<?php

namespace App\Model;

use App\Manager\CategoriaManager;

class CategoriaModel
{
    private $categoria;
    private $id;
    
    public function __construct()
    {
        $this->manager = new CategoriaManager();
    }

    public function listarCategorias()
    {
        return $this->manager
        ->setTable('categorias')
        ->listar()
        ->executar('select');
    }

    public function adicionarCategoria()
    {
        return $this->manager
        ->setTable('categorias')
        ->setCampo(['categoria'])
        ->setValor($this->getCategoria())
        ->inserir()
        ->executar('insert');
    }

    public function editarCategoria()
    {
        return $this->manager
        ->setTable('categorias')
        ->setCampo(['categoria'])
        ->setValor([$this->getCategoria()])
        ->setWhere($this->getId())
        ->editar()
        ->executar('update');
    }

    public function deletarCategoria()
    {
        return $this->manager
        ->setTable('categorias')
        ->setCampo(['id'])
        ->setValor([$this->getid()])
        ->deletar()
        ->executar('delete');
    }

    public function getCategoria()
    {
        return $this->categoria;
    }

    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;

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