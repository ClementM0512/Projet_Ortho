<?php

namespace App\Repository;

use App\Entity\Serret;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Serret|null find($id, $lockMode = null, $lockVersion = null)
 * @method Serret|null findOneBy(array $criteria, array $orderBy = null)
 * @method Serret[]    findAll()
 * @method Serret[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SerretRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Serret::class);
    }

    // /**
    //  * @return Serret[] Returns an array of Serret objects
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
    public function findOneBySomeField($value): ?Serret
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
