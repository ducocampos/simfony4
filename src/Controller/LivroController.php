<?php

namespace App\Controller;


use App\Model\LivroModel;
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
    }
    /**
     * @Route("/livros", name="livros_raiz")
     */
    public function listarLivros()
    {
        return $this->render("livros/listar_livros.html.twig", [
            'livros' => $this->model->listarLivros()
        ]);
    }



}