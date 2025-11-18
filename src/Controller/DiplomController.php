<?php

namespace App\Controller;

use App\Entity\JpmDiplom;
use App\Repository\JpmDiplomRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Routing\Annotation\Route;

use Doctrine\ORM\EntityManagerInterface;

use Psr\Log\LoggerInterface;

use DateTime;

class DiplomController extends AbstractController
{

    
    public function __construct(
        private LoggerInterface $phpLogger,
    ) {
    }

    #[Route('/', name: 'index_j_p_m')]
    public function index(Request $request, SerializerInterface $serializer): Response
    {
        $this->phpLogger->debug("[main Controller] Calling jpm");
        
        /*return $this->render('jpm/index.html.twig', [
         #   'nom' => "Jean-Pierre MENA",
			
        ]);*/

        $format = 'd/m/Y';
        $begin_date_str = '01/09/1988';
        $end_date_str = '01/09/1991';

        $diplom = new JpmDiplom();
        $diplom->setSchoolName("Ecole Centrale de Lille");
        $diplom->setUrl("https://centralelille.fr/");
        $diplom->setBeginDate(DateTime::createFromFormat($format, $begin_date_str));
        $diplom->setEndDate(DateTime::createFromFormat($format, $end_date_str));
        $diplom->setCursusDescription("Ecole Généraliste, fait partie du groupe des Ecoles Centrales");

        $jsonContent = $serializer->serialize($diplom, 'json');

        return JsonResponse::fromJsonString($jsonContent);
    }

    #[Route('/diplom/{id}', name: 'diplom_j_p_m')]
    public function getDiplom(SerializerInterface $serializer, EntityManagerInterface $entityManager, int $id): Response
    {
        $this->phpLogger->debug("[diplom Controller] Calling diplom with ID:".$id);
        
        $diplom =  $entityManager->getRepository(JpmDiplom::class)->find($id);

        if (!$diplom) {
            throw $this->createNotFoundException(
                'No diplom found for id '.$id
            );
        }

        $jsonContent = $serializer->serialize($diplom, 'json');

        return JsonResponse::fromJsonString($jsonContent);
    }

    #[Route('/diploms/{lang}', name: 'diploms_by_lang')]
    public function getDiplomForLang(SerializerInterface $serializer, JpmDiplomRepository $repo, string $lang): Response
    {
        $this->phpLogger->debug("[diplom Controller] Calling all the diploms for the specific language:".$lang);
        
        $diploms =  $repo->findAllDiplomforALanguage($lang);

        if (!$diploms) {
            throw $this->createNotFoundException(
                'No diplom found for language '.$lang
            );
        }

        $jsonContent = $serializer->serialize($diploms, 'json');

        return JsonResponse::fromJsonString($jsonContent);
    }
}