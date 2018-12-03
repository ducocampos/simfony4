<?php

namespace App\Model;

use App\Manager\LivroManager;

class LivroModel
{
    private $titulo;
    private $autor;
    private $editora;
    private $categoria;
    private $anoPublicacao;
    private $paginas;
    private $edicao;
    private $id;
    
    public function __construct()
    {
        $this->manager = new LivroManager();
    }

    public function listarLivros()
    {
        return $this->manager
        ->setTable('livros')
        ->setOrder('livros.id ASC')
        ->listar()
        ->executar('select');
    }

    public function adicionarLivro()
    {
        return $this->manager
        ->setTable('livros')
        ->setCampo(['titulo', 'idAutor', 'idEditora', 'idCategoria', 'idPublicacao', 'paginas', 'edicao'])
        ->setValor([$this->getTitulo(), $this->getAutor(), $this->getEditora(), $this->getCategoria(), $this->getAnoPublicacao(), $this->getPaginas(), $this->getEdicao()])
        ->inserir()
        ->executar('insert');
    }

    public function editarLivro()
    {
        $dados = "titulo = {$this->getTitulo()}, idAutor = {$this->getAutor()}, idEditora = {$this->getEditora()}, edicao = {$this->getEdicao()}, paginas = {$this->getPaginas()}, idCategoria = {$this->getCategoria()}, idPublicacao = {$this->getAnoPublicacao()}";
        // var_dump($this->getId()); exit;
        return $this->manager
        ->setTable('livros')
        ->setCamposUp($dados)
        ->setWhere($this->getId())
        ->editar()
        ->executar('update');
    }

    public function deletarLivro()
    {
        return $this->manager
        ->setTable('livros')
        ->setCampo(['id'])
        ->setValor([$this->getId()])
        ->deletar()
        ->executar('delete');
    }
  
    public function getTitulo()
    {
        return '"' . $this->titulo . '"';
    }

    public function setTitulo(string $titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    public function getAnoPublicacao()
    {
        return $this->anoPublicacao;
    }

    public function setAnoPublicacao(int $anoPublicacao)
    {
        $this->anoPublicacao = $anoPublicacao;

        return $this;
    }

    public function getEdicao()
    {
        return $this->edicao;
    }

    public function setEdicao(int $edicao)
    {
        $this->edicao = $edicao;

        return $this;
    }

    public function getPaginas()
    {
        return $this->paginas;
    }

    public function setPaginas(int $paginas)
    {
        $this->paginas = $paginas;

        return $this;
    }

    public function getAutor()
    {
        return $this->autor;
    }

    public function setAutor(int $autor)
    {
        $this->autor = $autor;

        return $this;
    }

    public function getEditora()
    {
        return $this->editora;
    }

    public function setEditora($editora)
    {
        $this->editora = $editora;

        return $this;
    }

    public function getCategoria()
    {
        return $this->categoria;
    }

    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;

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