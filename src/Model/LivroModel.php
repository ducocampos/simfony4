<?php

namespace App\Model;

use App\Manager\LivroManager;

class LivroModel
{
    public function __construct()
    {
        $this->manager = new LivroManager();
    }

    public function listarLivros()
    {
        return $this->manager
        ->setTable('livros')
        ->listar()
        ->executar('select');
    }
}