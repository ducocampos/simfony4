<?php

namespace App\Controller;


use App\Model\AutorModel;
use App\Model\LivroModel;
use App\Model\EditoraModel;
use App\Model\CategoriaModel;
use App\Model\AnoEdicoesModel;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LivroController extends AbstractController
{
    private $model;

    public function __construct()
    {
        $this->model = new LivroModel();
        $this->modelAutores = new AutorModel();
        $this->modelEditoras = new EditoraModel();
        $this->modelCategorias = new CategoriaModel();
        $this->modelAnos = new AnoEdicoesModel();
    }

    /**
     * @Route("/livros", name="livros_raiz")
     */
    public function listarLivros()
    {
        return $this->render("livros/listar_livros.html.twig", [
            'livros' => $this->model->listarLivros(),
            'autores' => $this->modelAutores->listarAutores(),
            'editoras' => $this->modelEditoras->listarEditoras(),
            'categorias' => $this->modelCategorias->listarCategorias(),
            'anos' => $this->modelAnos->listarAnoEdicoes()
        ]);
    }

    /**
     * @Route("/livros/inserir", name="livros_inserir")
     */
    public function inserirLivro(Request $request)
    {
        // var_dump($request->request->all()); exit;
        $dados = $request->request->all();
        $this->model->setTitulo($dados['titulo']);
        $this->model->setAutor($dados['autor']);
        $this->model->setEditora($dados['editora']);
        $this->model->setCategoria($dados['categoria']);
        $this->model->setAnoPublicacao($dados['anoEdicao']);
        $this->model->setPaginas($dados['paginas']);
        $this->model->setEdicao($dados['edicao']);
        $this->model->adicionarLivro();
        return $this->render("livros/listar_livros.html.twig", [
            'livros' => $this->model->listarLivros(),
            'autores' => $this->modelAutores->listarAutores(),
            'editoras' => $this->modelEditoras->listarEditoras(),
            'categorias' => $this->modelCategorias->listarCategorias(),
            'anos' => $this->modelAnos->listarAnoEdicoes()
        ]);
    }

    /**
     * @Route("/livros/editar", name="livros_editar")
     */
    public function editarLivro(Request $request)
    {
        // var_dump($request->request->all()); exit;
        $dados = $request->request->all();
        $this->model->setTitulo($dados['titulo']);
        $this->model->setAutor($dados['autor']);
        $this->model->setEditora($dados['editora']);
        $this->model->setCategoria($dados['categoria']);
        $this->model->setAnoPublicacao($dados['anoEdicao']);
        $this->model->setPaginas($dados['paginas']);
        $this->model->setEdicao($dados['edicao']);
        $this->model->setId($dados['id']);
        $this->model->editarLivro();
        return $this->render("livros/listar_livros.html.twig", [
            'livros' => $this->model->listarLivros(),
            'autores' => $this->modelAutores->listarAutores(),
            'editoras' => $this->modelEditoras->listarEditoras(),
            'categorias' => $this->modelCategorias->listarCategorias(),
            'anos' => $this->modelAnos->listarAnoEdicoes()
        ]); 
    }

    /**
     * @Route("/livros/deletar/{id}", name="livros_deletar")
     */
    public function deletarLivro($id)
    {
        $this->model->setId($id);
        $this->model->deletarLivro();
        return $this->render("livros/listar_livros.html.twig", [
            'livros' => $this->model->listarLivros(),
            'autores' => $this->modelAutores->listarAutores(),
            'editoras' => $this->modelEditoras->listarEditoras(),
            'categorias' => $this->modelCategorias->listarCategorias(),
            'anos' => $this->modelAnos->listarAnoEdicoes()
        ]);
    }
}