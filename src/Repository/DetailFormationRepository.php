<?php

namespace App\Repository;

use App\Entity\DetailFormation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method DetailFormation|null find($id, $lockMode = null, $lockVersion = null)
 * @method DetailFormation|null findOneBy(array $criteria, array $orderBy = null)
 * @method DetailFormation[]    findAll()
 * @method DetailFormation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DetailFormationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DetailFormation::class);
    }

    // /**
    //  * @return DetailFormation[] Returns an array of DetailFormation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DetailFormation
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
