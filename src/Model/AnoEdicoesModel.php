<?php

namespace App\Model;

use App\Manager\AnoEdicoesManager;

class AnoEdicoesModel
{
    public function __construct()
    {
        $this->manager = new AnoEdicoesManager();
    }

    public function listarAnoEdicoes()
    {
        return $this->manager
        ->setTable('publicacoes')
        ->listar()
        ->executar('select');
    }
}