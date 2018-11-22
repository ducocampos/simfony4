<?php

namespace App\Controller;


use App\Model\HelloModel;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HelloController extends AbstractController
{
    private $model;

    public function __construct()
    {
        $this->model = new HelloModel();
    }
    /**
     * @Route("/hello")
     */
    public function resposta()
    {
        return new Response(
            'Teste'
        );
    }

    /**
     * @Route("/teste", name="teste")
     */
    public function teste()

    {
        return $this->render("hello/teste.html.twig", [
            'dados' => $this->model->listarHello()
        ]);
    }
    /**
     * @Route("/mensagem", name="mensagem")
     */
    public function mensagem()
    {
        return $this->render("hello/mensagem.html.twig", [
            'mensagem' => "Apenas uma mensagem!"
        ]);
    }


}