<?php

namespace App\Manager;

use App\DB\MySQLConnection;
use App\DB\CRUD\AbstractCrud;

class AnoEdicoesManager extends AbstractCrud
{
    public function __construct()
    {
        parent::__construct(MySQLConnection::getPDO());
    }

    public function listar()
    {
        $this->setSql("SELECT {$this->getTable()}.* FROM {$this->getTable()}");
        return $this;
    }

    public function inserir()
    {
        $this->setSql("INSERT INTO {$this->getTable()} ({$this->getCampo()}) VALUES (' {$this->getValor()} ')");
        return $this;
    }

}