<?php

namespace App\Controller;

use App\Model\CategoriaModel;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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



}