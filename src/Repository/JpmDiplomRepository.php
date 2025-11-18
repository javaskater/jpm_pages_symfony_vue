<?php

namespace App\Repository;

use App\Entity\JpmDiplom;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<JpmDiplom>
 */
class JpmDiplomRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, JpmDiplom::class);
    }
    /**
     * @return JpmDiplom[] Returns an array of JpmDiplom objects
     */
    public function findAllDiplomforALanguage(string $language):array {
        $queryBuilder = $this->createQueryBuilder('jpmd');
        $diplomsQuery = $queryBuilder->select('jpmd')->where('jpmd.language = :lang')->setParameter('lang',$language);
        return $diplomsQuery->getQuery()->getResult();
    }
    //    /**
    //     * @return JpmDiplom[] Returns an array of JpmDiplom objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('j')
    //            ->andWhere('j.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('j.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?JpmDiplom
    //    {
    //        return $this->createQueryBuilder('j')
    //            ->andWhere('j.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
