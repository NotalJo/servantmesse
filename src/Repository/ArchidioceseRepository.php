<?php

namespace App\Repository;

use App\Entity\Archidiocese;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Archidiocese|null find($id, $lockMode = null, $lockVersion = null)
 * @method Archidiocese|null findOneBy(array $criteria, array $orderBy = null)
 * @method Archidiocese[]    findAll()
 * @method Archidiocese[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArchidioceseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Archidiocese::class);
    }

    // /**
    //  * @return Archidiocese[] Returns an array of Archidiocese objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Archidiocese
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
