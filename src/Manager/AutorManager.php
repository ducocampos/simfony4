<?php

namespace App\Manager;

use App\DB\MySQLConnection;
use App\DB\CRUD\AbstractCrud;

class AutorManager extends AbstractCrud
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

    public function editar()
    {
        $this->setSql("UPDATE {$this->getTable()} SET {$this->getCampo()} = '{$this->getValor()}' WHERE id = {$this->getWhere()}");
        return $this;
    }

    public function deletar()
    {
        $this->setSql("DELETE FROM {$this->getTable()} WHERE {$this->getCampo()} = {$this->getValor()}");
        
        return $this;
    }

}