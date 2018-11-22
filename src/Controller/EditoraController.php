<?php

namespace App\Controller;


use App\Model\EditoraModel;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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



}