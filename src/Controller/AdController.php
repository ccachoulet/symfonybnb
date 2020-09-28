<?php

namespace App\Controller;

use App\Entity\Ad;
use App\Repository\AdRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdController extends AbstractController
{
    /**
     * @Route("/ads", name="ads_index")
     */
    public function index(AdRepository $repo)
    {
        $ads = $repo->findAll();
        return $this->render('ad/index.html.twig', [
            'ads' => $ads
        ]);
    }

    /**
     * @Route("/ads/new", name="ads_create")
     */
    public function create() {
        return $this->render('ad/new.html.twig');
    }
    
    /**
     * @Route("/ads/{slug}", name="ads_show")
     */
    public function show(Ad $ad) {
        // Je récupère l'annonce qui correspond au slug 

        return $this->render('ad/show.html.twig', [
            'ad' => $ad
        ]);
    }

}
