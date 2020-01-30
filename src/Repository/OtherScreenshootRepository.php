<?php

namespace App\Repository;

use App\Entity\OtherScreenshoot;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method OtherScreenshoot|null find($id, $lockMode = null, $lockVersion = null)
 * @method OtherScreenshoot|null findOneBy(array $criteria, array $orderBy = null)
 * @method OtherScreenshoot[]    findAll()
 * @method OtherScreenshoot[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OtherScreenshootRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OtherScreenshoot::class);
    }

    // /**
    //  * @return OtherScreenshoot[] Returns an array of OtherScreenshoot objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?OtherScreenshoot
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
