<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class JPMController extends AbstractController
{

    #[Route('/', name: 'app_j_p_m')]
    public function index(Request $request): Response
    {
        return $this->render('jpm/index.html.twig', [
            'nom' => "Jean-Pierre MENA",
			
        ]);
    }
}