<?php

namespace App\Repository;

use App\Entity\Bilan01;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Bilan01|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bilan01|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bilan01[]    findAll()
 * @method Bilan01[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class Bilan01Repository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Bilan01::class);
    }

    // /**
    //  * @return Bilan01[] Returns an array of Bilan01 objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Bilan01
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
