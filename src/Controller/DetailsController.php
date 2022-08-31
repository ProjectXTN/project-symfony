<?php

namespace App\Controller;

use App\Entity\Articles;
use App\Entity\Auteurs;
use App\Form\InsertArticleType;
use App\Form\InsertAuteurType;
use App\Repository\ArticlesRepository;
use App\Repository\AuteursRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



class DetailsController extends AbstractController
{
    #[Route('/details', name: 'app_details')]
    public function index(ArticlesRepository $articlesRepository, AuteursRepository $auteursRepository): Response
    {
        
        // COMO FAZER A SELEÇÃO NA BASE DE DONNES

        //Para fazer uma pesquisa geral usa o findAll
        $list = $articlesRepository->findAll();
        $listAuteurs = $auteursRepository->findAll();


        return $this->render('details/index.html.twig', [
            'controller_name' => 'DetailsController',
            'articles' => $list,
            'auteurs' => $listAuteurs
        ]);
    }


    // ADICIONANDO DADOS NA BASE DE DONNÉE CARREGANDO A PAGINA
    //#[Route('/insert', name: 'app_details_insert')]
/*     public function insert(ArticlesRepository $articlesRepository)
    {

        $article = new Articles();
        $article->setName('Mini Cooper');
        $article->setType('Voiture');
        $article->setPrice(45000);

        $articlesRepository->add($article, true);

        return $this->redirectToRoute('app_details');
    } */

     // DELETAR OBJETO NA BASE DE DONNÉE
    #[Route('/delete/{id}', name: 'app_details_delete')]
    public function delete($id, ArticlesRepository $articlesRepository)
    {
        $article = $articlesRepository->findOneById($id);
        $articlesRepository->remove($article, true);

        return $this->redirectToRoute('app_details');
    }

    // FUNÇÃO PARA MOSTRAR O FORMULARIO
    #[Route('/form', name: 'app_details_form')]
    public function form(ArticlesRepository $articlesRepository, Request $request){
        
        $article = new Articles();

        $form = $this->createForm(InsertArticleType::class, $article);
        // ADICIONANDO DADOS NA BASE DE DONNÉE COM O FORM
        $form->handleRequest($request);
        //Precisa fazer o If para quando entrar na função ele adicionar o que foi escrito na basde de donne
        if ($form->isSubmitted() && $form->isValid()) {
           
            $articlesRepository->add($article, true);

            $this->addFlash('success', 'Bravo vous avez créer un article');

            return $this->redirectToRoute('app_details');

        }

        return $this->renderForm('details/form.html.twig', ['form'=>$form]);
    }


    // ******** TEM QUE ARRUMAR ESSA FUNçÃO // VOU FAZER COM UM CRUD******
    // FUNÇÃO PARA MOSTRAR O FORMULARIO
    //#[Route('/formAuteur', name: 'app_details_formAuteurs_2')]
/*     public function formAuteurs(AuteursRepository $auteursRepository, Request $request){
        
        $auteur = new Auteurs();

        $form = $this->createForm(InsertAuteurType::class, $auteur);
        // ADICIONANDO DADOS NA BASE DE DONNÉE COM O FORM
        $form->handleRequest($request);
        //Precisa fazer o If para quando entrar na função ele adicionar o que foi escrito na basde de donne
        if ($form->isSubmitted() && $form->isValid()) {
           
            $auteursRepository->add($auteur, true);
            return $this->redirectToRoute('app_details');
        }

        return $this->renderForm('details/formAuteur.html.twig', ['form'=>$form]);
    } */
}