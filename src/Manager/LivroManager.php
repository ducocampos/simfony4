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
        autores.id AS autoresId,
        autores.autor,
        editoras.id AS editorasId,
        editoras.editora,
        {$this->getTable()}.edicao,
        {$this->getTable()}.paginas,
        categorias.id AS categoriasId,
        categorias.categoria,
        publicacoes.id AS publicacoesId,
        publicacoes.anoPublicacao
        FROM {$this->getTable()}
        LEFT JOIN autores ON {$this->getTable()}.idAutor = autores.id
        LEFT JOIN editoras ON {$this->getTable()}.idEditora = editoras.id
        LEFT JOIN categorias ON {$this->getTable()}.idCategoria = categorias.id
        LEFT JOIN publicacoes ON {$this->getTable()}.idPublicacao = publicacoes.id
        ORDER BY {$this->getOrder()}");
        return $this;
    }

    public function inserir()
    {
        $this->setSql("INSERT INTO {$this->getTable()} ({$this->getCampo()}) VALUES ( {$this->getValor()} )");
        return $this;
    }

    public function editar()
    {
        $this->setSql("UPDATE {$this->getTable()} SET {$this->getCamposUp()} WHERE id = {$this->getWhere()}");
        return $this;
    }

    public function deletar()
    {
        $this->setSql("DELETE FROM {$this->getTable()} WHERE {$this->getCampo()} = {$this->getValor()}");
        return $this;
    }
}