<?php

namespace App\Model;

use App\Manager\HelloManager;

class HelloModel
{
    public function __construct()
    {
        $this->manager = new HelloManager();
    }

    public function listarHello()
    {
        return $this->manager
        ->setTable('produtos')
        ->listar()
        ->executar('select');
    }
}

