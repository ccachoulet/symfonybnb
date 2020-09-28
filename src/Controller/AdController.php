<?php

namespace App\Controller;

use App\Entity\Ad;
use App\Form\AdType;
use App\Repository\AdRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

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
        $ad = new Ad();
        $form = $this->createForm(AdType::class, $ad);
        return $this->render('ad/new.html.twig',[
            'form' => $form->createView()
        ]);
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
