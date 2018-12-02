<?php

namespace App\Controller;


use App\Model\EditoraModel;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class EditoraController extends AbstractController
{
    private $model;

    public function __construct()
    {
        $this->model = new EditoraModel();
    }
    /**
     * @Route("/editoras", name="editoras_raiz")
     */
    public function listarEditoras()
    {
        return $this->render("editoras/listar_editoras.html.twig", [
            'editoras' => $this->model->listarEditoras()
        ]);
    }

    /**
     * @Route("/editoras/inserir", name="editoras_inserir")
     */
    public function adicionarEditora(Request $request)
    {
        $dados = $request->request->all();
        $this->model->setEditora($dados);
        $this->model->adicionarEditora();
        return $this->render("editoras/listar_editoras.html.twig", [
            'editoras' => $this->model->listarEditoras()
        ]);
    }

    /**
     * @Route("editoras/editar", name="editoras_editar")
     */
    public function editarEditora(Request $request)
    {
        $dados = $request->request->all();
        $this->model->setEditora($dados['editora']);
        $this->model->setId($dados['id']);
        $this->model->editarEditora();
        return $this->render("editoras/listar_editoras.html.twig", [
            'editoras' => $this->model->listarEditoras()
        ]);        
    }
    /**
     * @Route("/editoras/deletar/{id}", name="editoras_deletar")
     */
    public function deletarEditora($id)
    {
        $this->model->setid($id);
        $this->model->deletarEditora();
        return $this->render("editoras/listar_editoras.html.twig", [
            'editoras' => $this->model->listarEditoras()
        ]);        
    }
}