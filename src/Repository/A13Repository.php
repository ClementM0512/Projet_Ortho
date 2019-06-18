<?php

namespace App\Repository;

use App\Entity\A13;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method A13|null find($id, $lockMode = null, $lockVersion = null)
 * @method A13|null findOneBy(array $criteria, array $orderBy = null)
 * @method A13[]    findAll()
 * @method A13[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class A13Repository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, A13::class);
    }

    // /**
    //  * @return A13[] Returns an array of A13 objects
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
    public function findOneBySomeField($value): ?A13
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
