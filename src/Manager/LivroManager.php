<?php

namespace App\Manager;

use App\DB\MySQLConnection;
use App\DB\CRUD\AbstractCrud;

class LivroManager extends AbstractCrud
{
    public function __construct()
    {
        parent::__construct(MySQLConnection::getPDO());
    }

    public function listar()
    {
        $this->setSql("SELECT {$this->getTable()}.id,
        {$this->getTable()}.titulo,
        autores.autor,
        editoras.editora,
        {$this->getTable()}.edicao,
        {$this->getTable()}.paginas,
        categorias.categoria,
        publicacoes.anoPublicacao
        FROM {$this->getTable()}
        LEFT JOIN autores ON {$this->getTable()}.idAutor = autores.id
        LEFT JOIN editoras ON {$this->getTable()}.idEditora = editoras.id
        LEFT JOIN categorias ON {$this->getTable()}.idCategoria = categorias.id
        LEFT JOIN publicacoes ON {$this->getTable()}.idPublicacao = publicacoes.id");
        return $this;
    }

}