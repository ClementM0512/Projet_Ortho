<?php

namespace App\Repository;

use App\Entity\Confrontation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Confrontation|null find($id, $lockMode = null, $lockVersion = null)
 * @method Confrontation|null findOneBy(array $criteria, array $orderBy = null)
 * @method Confrontation[]    findAll()
 * @method Confrontation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConfrontationRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Confrontation::class);
    }

    // /**
    //  * @return Confrontation[] Returns an array of Confrontation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Confrontation
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
