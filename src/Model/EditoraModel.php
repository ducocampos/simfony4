<?php

namespace App\Model;

use App\Manager\EditoraManager;

class EditoraModel
{
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
}