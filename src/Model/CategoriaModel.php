<?php

namespace App\Model;

use App\Manager\CategoriaManager;

class CategoriaModel
{
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
}