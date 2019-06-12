<?php

namespace App\Repository;

use App\Entity\Charge2;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Charge2|null find($id, $lockMode = null, $lockVersion = null)
 * @method Charge2|null findOneBy(array $criteria, array $orderBy = null)
 * @method Charge2[]    findAll()
 * @method Charge2[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class Charge2Repository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Charge2::class);
    }

    // /**
    //  * @return Charge2[] Returns an array of Charge2 objects
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
    public function findOneBySomeField($value): ?Charge2
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
