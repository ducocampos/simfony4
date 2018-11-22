<?php

namespace App\Model;

use App\Manager\AutorManager;

class AutorModel
{
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
}