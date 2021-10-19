<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        //créer un tableau avec identifiant, titre et date
        $tableau=array("identifiant"=>"numéro1","description"=>"cest le numéro 1","date"=>"08/08");
        return $this->render('index/index.html.twig', [
            'leTableau' => $tableau,
        ]);
    }
}
