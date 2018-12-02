<?php

namespace App\Controller;

use App\Model\AutorModel;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class AutorController extends AbstractController
{
    private $model;

    public function __construct()
    {
        $this->model = new AutorModel();
    }
    /**
     * @Route("/autores", name="autores_raiz")
     */
    public function listarAutores()
    {
        return $this->render("autores/listar_autores.html.twig", [
            'autores' => $this->model->listarAutores()
        ]);
    }

    /**
     * @Route("/autores/inserir", name="autores_inserir")
     */
    public function inserirAutor(Request $request)
    {
        $dados = $request->request->all();
        $this->model->setAutor($dados);
        $this->model->adicionarAutor();
        return $this->render("autores/listar_autores.html.twig", [
            'autores' => $this->model->listarAutores()
        ]);       
    }

    /**
     * @Route("/autores/editar", name="autores_editar")
     */
    public function editarAutor(Request $request)
    {
        $dados = $request->request->all();
        $this->model->setAutor($dados['autor']);
        $this->model->setId($dados['id']);
        $this->model->editarAutor();
        return $this->render("autores/listar_autores.html.twig", [
            'autores' => $this->model->listarAutores()
        ]);  
    }
    /**
     * @Route("/autores/deletar/{id}", name="autores_deletar")
     */
    public function deletarAutor($id)
    {
        $this->model->setId($id);
        $this->model->deletarAutor();
        return $this->render("autores/listar_autores.html.twig", [
            'autores' => $this->model->listarAutores()
        ]);   

    }
}