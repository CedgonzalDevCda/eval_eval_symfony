<?php

namespace App\Controller;

use App\Repository\AnnonceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(AnnonceRepository $annonceRepository): Response
    {
        return $this->render('main/index.html.twig', [
            'annonces' => $annonceRepository->findAll(),
        ]);
    }

    #[Route('/marque/{brand}', name: 'single_brand')]
    public function singlereg($brand, AnnonceRepository $annonceRepository):Response
    {
        return $this->render('main/wbrand.html.twig', [
            'brand' => $brand,
            'annonce' => $annonceRepository->find($brand),
            'annonces' => $annonceRepository->findAll(),

        ]);
    }
}
