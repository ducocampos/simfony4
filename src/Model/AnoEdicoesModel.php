<?php

namespace App\Model;

use App\Manager\AnoEdicoesManager;

class AnoEdicoesModel
{
    private $anoEdicao;
    private $id;
    
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

    public function adicionarAno()
    {
        $teste = $this->getAnoEdicao();
        $teste2[] = 'anoPublicacao';
  
        return $this->manager
        ->setTable('publicacoes')
        ->setCampo($teste2)
        ->setValor($teste)
        ->inserir()
        ->executar('insert');
    }

    public function editarAno()
    {
        return $this->manager
        ->setTable('publicacoes')
        ->setCampo(['anoPublicacao'])
        ->setValor([$this->getAnoEdicao()])
        ->setWhere($this->getId())
        ->editar()
        ->executar('update');
    }

    public function deletarAno()
    {
        return $this->manager
        ->setTable('publicacoes')
        ->setCampo(['id'])
        ->setValor([$this->getId()])
        ->deletar()
        ->executar('delete');
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