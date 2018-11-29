<?php

namespace App\Model;

use App\Manager\AnoEdicoesManager;

class AnoEdicoesModel
{
    private $anoEdicao;
    
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

    public function adicionarAno($ano)
    {
        $this->setAnoEdicao($ano);
        $teste = $this->getAnoEdicao();
        $teste2[] = 'anoPublicacao';
  
        return $this->manager
        ->setTable('publicacoes')
        ->setCampo($teste2)
        ->setValor($teste)
        ->inserir()
        ->executar('insert');
    }

    public function getAnoEdicao()
    {
        return $this->anoEdicao;
    }

    public function setAnoEdicao($anoEdicao)
    {
        $this->anoEdicao = $anoEdicao;

        return $this;
    }
}