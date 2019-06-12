<?php

namespace App\Repository;

use App\Entity\Affichages;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Affichages|null find($id, $lockMode = null, $lockVersion = null)
 * @method Affichages|null findOneBy(array $criteria, array $orderBy = null)
 * @method Affichages[]    findAll()
 * @method Affichages[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AffichagesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Affichages::class);
    }

    // /**
    //  * @return Affichages[] Returns an array of Affichages objects
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
    public function findOneBySomeField($value): ?Affichages
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
