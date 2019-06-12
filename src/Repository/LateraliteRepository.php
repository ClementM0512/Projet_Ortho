<?php

namespace App\Repository;

use App\Entity\Lateralite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Lateralite|null find($id, $lockMode = null, $lockVersion = null)
 * @method Lateralite|null findOneBy(array $criteria, array $orderBy = null)
 * @method Lateralite[]    findAll()
 * @method Lateralite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LateraliteRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Lateralite::class);
    }

    // /**
    //  * @return Lateralite[] Returns an array of Lateralite objects
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
    public function findOneBySomeField($value): ?Lateralite
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
