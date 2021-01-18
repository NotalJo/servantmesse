<?php

namespace App\Repository;

use App\Entity\SubdivisionEcclesiastique;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SubdivisionEcclesiastique|null find($id, $lockMode = null, $lockVersion = null)
 * @method SubdivisionEcclesiastique|null findOneBy(array $criteria, array $orderBy = null)
 * @method SubdivisionEcclesiastique[]    findAll()
 * @method SubdivisionEcclesiastique[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SubdivisionEcclesiastiqueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SubdivisionEcclesiastique::class);
    }

    // /**
    //  * @return SubdivisionEcclesiastique[] Returns an array of SubdivisionEcclesiastique objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SubdivisionEcclesiastique
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
