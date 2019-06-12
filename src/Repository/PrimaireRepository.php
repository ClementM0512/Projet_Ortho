<?php

namespace App\Repository;

use App\Entity\Primaire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Primaire|null find($id, $lockMode = null, $lockVersion = null)
 * @method Primaire|null findOneBy(array $criteria, array $orderBy = null)
 * @method Primaire[]    findAll()
 * @method Primaire[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PrimaireRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Primaire::class);
    }

    // /**
    //  * @return Primaire[] Returns an array of Primaire objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Primaire
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
