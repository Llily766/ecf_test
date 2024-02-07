<?php

namespace App\Controller;

// use App\Entity\Hours;
use App\Entity\Service;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AccueilController extends AbstractController
{
    #[Route('/', name: 'app_accueil')]
    public function index (EntityManagerInterface $entityManager): Response 
    {
        $services = $entityManager->getRepository(Service::class)->findAll();
        // $hours = $entityManager->getRepository(Hours::class)->findAll();
        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController',
            // 'hours'=> $hours,
            'services' => $services ,
        
        ]);
    }

    
}