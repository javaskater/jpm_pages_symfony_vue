<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Psr\Log\LoggerInterface;

class JPMController extends AbstractController
{

    
    public function __construct(
        private LoggerInterface $phpLogger,
    ) {
    }

    #[Route('/', name: 'app_j_p_m')]
    public function index(Request $request): Response
    {
        $this->phpLogger->debug("[main Controller] Calling jpm");
        
        /*return $this->render('jpm/index.html.twig', [
         #   'nom' => "Jean-Pierre MENA",
			
        ]);*/
        return new Response(
            'OK'
        );
    }
}