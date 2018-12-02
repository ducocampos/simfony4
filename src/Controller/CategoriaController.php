<?php

namespace App\Controller;

use App\Model\CategoriaModel;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class CategoriaController extends AbstractController
{
    private $model;

    public function __construct()
    {
        $this->model = new CategoriaModel();
    }

    /**
     * @Route("/categorias", name="categorias_raiz")
     */
    public function listarCategorias()
    {
        return $this->render("categorias/listar_categorias.html.twig", [
            'categorias' => $this->model->listarCategorias()
        ]);
    }

    /**
     * @Route("/categorias/inserir", name="categorias_inserir")
     */
    public function inserirCategoria(Request $request)
    {
        $dados = $request->request->all();
        $this->model->setCategoria($dados);
        $this->model->adicionarCategoria();
        return $this->render("categorias/listar_categorias.html.twig", [
            'categorias' => $this->model->listarCategorias()
        ]);
    }

    /**
     * @Route("/categorias/editar", name="categorias_editar")
     */
    public function editarCategoria(Request $request)
    {
        $dados = $request->request->all();
        $this->model->setCategoria($dados['categoria']);
        $this->model->setId($dados['id']);
        $this->model->editarCategoria();
        return $this->render("categorias/listar_categorias.html.twig", [
            'categorias' => $this->model->listarCategorias()
        ]);     
    }

    /**
     * @Route("/categorias/deletar/{id}", name="deletar_categorias")
     */
    public function deletarCategoria($id)
    {
        $this->model->setId($id);
        $this->model->deletarCategoria();
        return $this->render("categorias/listar_categorias.html.twig", [
            'categorias' => $this->model->listarCategorias()
        ]);        
    }
}