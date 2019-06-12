<?php

namespace App\Repository;

use App\Entity\Lycee;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Lycee|null find($id, $lockMode = null, $lockVersion = null)
 * @method Lycee|null findOneBy(array $criteria, array $orderBy = null)
 * @method Lycee[]    findAll()
 * @method Lycee[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LyceeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Lycee::class);
    }

    // /**
    //  * @return Lycee[] Returns an array of Lycee objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Lycee
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
