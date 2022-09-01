<?php

namespace App\Controller;

use App\Repository\ArticlesRepository;
use App\Repository\AuteursRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(ArticlesRepository $articlesRepository, AuteursRepository $auteursRepository): Response
    {
        //Função como pegar o ultimo articulo ou autor
        $lastArticle = current($articlesRepository->getLastArticle());
        $lastAuteur = current($auteursRepository->getLastAuteur());


        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'lastArticle' => $lastArticle,
            'lastAuteur' => $lastAuteur
        ]);
    }
}
