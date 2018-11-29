<?php

namespace App\Controller;

use App\Model\AnoEdicoesModel;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

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

    /**
     * @Route("/ano_edicoes/insere", name="ano_edicoes_inserir")
     */
    public function inserir(Request $request)
    {
        $dadosForm = $request->request->all();
        $this->model->adicionarAno($dadosForm);
        return $this->render("edicoes/listar_ano_edicoes.html.twig", [
            'anos' => $this->model->listarAnoEdicoes()
        ]);
    }

    /**
     * @Route("/ano_edicoes/delete/{$id}", name="ano_edicoes_deletar")
     */

    public function deletar($id)
    {
        # code...
    }
}