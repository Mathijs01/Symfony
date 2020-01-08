<?php

namespace App\Repository;

use App\Entity\Gedragsregels;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Gedragsregels|null find($id, $lockMode = null, $lockVersion = null)
 * @method Gedragsregels|null findOneBy(array $criteria, array $orderBy = null)
 * @method Gedragsregels[]    findAll()
 * @method Gedragsregels[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GedragsregelsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Gedragsregels::class);
    }

    // /**
    //  * @return Gedragsregels[] Returns an array of Gedragsregels objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Gedragsregels
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
