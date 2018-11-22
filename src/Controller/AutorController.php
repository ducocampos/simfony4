<?php

namespace App\Controller;

use App\Model\AutorModel;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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



}