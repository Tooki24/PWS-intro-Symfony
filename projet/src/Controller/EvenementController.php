<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EvenementController extends AbstractController
{
    #[Route('/evenement', name: 'evenement')]
    public function index(): Response
    {
        return $this->render('evenement/index.html.twig', [
            'controller_name' => 'EvenementController',
        ]);
    }

    #[Route('/detailevt/{id?}', name: 'detailevt')]
    public function detailevt(?int $id): Response
    {
        //acces aux services Doctrine, puis entityManager, puis Repository de l'objet Evenement :
        $repository=$this->getDoctrine()->getManager()->getRepository('App\Entity\Evenement');
        //récupération de l'évenement passé en paramètre
        $EvenementChoisi=$repository->find($id);

        return $this->render('evenement/detailevt.html.twig',[
            'EvenementChoisi'=>$EvenementChoisi,
        ]);
    }

    #[Route('/detailevtpass/{id?}', name: 'detail evt passé')]
    public function detailevtpass(?int $id): Response
    {
        return $this->render('evenement/detailevtpass.html.twig',[
            'controller_name'=>'page détails evenement passé ',
            'id'=>$id,
        ]);
    }

    #[Route('/detailprop/{id?}', name: 'detail proposition')]
    public function detailprop(?int $id): Response
    {
        return $this->render('evenement/detailprop.html.twig',[
            'controller_name'=>'detail proposition',
            'id'=>$id,
        ]);
    }

    #[Route('/detailsession/{id?}', name: 'detail session')]
    public function detailsession(?int $id): Response
    {
        return $this->render('evenement/detailsession.html.twig',[
            'controller_name'=>'detail session',
            'id'=>$id,
        ]);
    }

    #[Route('/add/{id?}', name: 'nouvel evenement')]
    public function add(?int $id): Response
    {
        return $this->render('evenement/add.html.twig',[
            'controller_name'=>'add',
            'id'=>$id,
        ]);
    }

    #[Route('/addprop/{id?}', name: 'nouvelle proposition')]
    public function addprop(?int $id): Response
    {
        return $this->render('evenement/addprop.html.twig',[
            'controller_name'=>'addprop',
            'id'=>$id,
        ]);
    }

    #[Route('/listevt', name: 'liste des évènements')]
    public function listevt(): Response
    {
        $repository=$this->getDoctrine()->getManager()->getRepository('App\Entity\Evenement');
        $evenements=$repository->findAll();
        return $this->render('evenement/listevt.html.twig',[
            'controller_name'=>'listevt',
            'evenements'=>$evenements,
        ]);
    }

}
