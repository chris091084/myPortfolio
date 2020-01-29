<?php

namespace App\Repository;

use App\Entity\OtherPictures;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method OtherPictures|null find($id, $lockMode = null, $lockVersion = null)
 * @method OtherPictures|null findOneBy(array $criteria, array $orderBy = null)
 * @method OtherPictures[]    findAll()
 * @method OtherPictures[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OtherPicturesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OtherPictures::class);
    }

    // /**
    //  * @return OtherPictures[] Returns an array of OtherPictures objects
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
    public function findOneBySomeField($value): ?OtherPictures
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
