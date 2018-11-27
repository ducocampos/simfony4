<?php

namespace App\Controller;

use App\Model\AnoEdicoesModel;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AnoEdicoesController extends AbstractController
{
    private $model;

    public function __construct()
    {
        $this->model = new AnoEdicoesModel();
    }
    /**
     * @Route("/ano_edicoes", name="ano_edicoes_raiz")
     */
    public function listarAnoEdicoes()
    {
        return $this->render("edicoes/listar_ano_edicoes.html.twig", [
            'anos' => $this->model->listarAnoEdicoes()
        ]);
    }



}